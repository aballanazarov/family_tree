<?php

namespace tree\controllers;

use common\models\LoginForm;
use tree\assets\NullScrollAsset;
use common\models\Tree;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;


class SiteController extends Controller
{
    public function init()
    {
        NullScrollAsset::register($this->view);
        parent::init();
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                    'login' => ['GET', 'POST'],
                    'logout' => ['POST'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }


    public function actionIndex()
    {
        $trees = Tree::find()
            ->where(['parent_id' => null])
            ->all();

        return $this->render('index',[
            'trees' => $trees,
        ]);
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
