<?php

namespace console\controllers;

use common\models\User;
use common\constant\UserRole;
use Yii;
use yii\console\Controller;
use yii\helpers\FileHelper;
use yii\helpers\Inflector;

/**
 * This command creates roles
 * @author Azizjon Allanazarov <aballanazarov@gmail.com>
 * @since 1.0
 */
class InitController extends Controller
{
    function actionCreateAdmin()
    {
        $user = User::findOne(['username' => 'admin']);
        $pass = '1@$$@!0m!';
        if (!$user){
            $user = new User();
            $user->username = 'admin';
            $user->auth_key = \Yii::$app->security->generateRandomString();
            $user->password_hash = \Yii::$app->security->generatePasswordHash($pass);
            $user->email = 'aballanazarov@gmail.com';
            $user->status = 10;
            $user->created_at = time();
        }
        else{
            $user->password_hash = \Yii::$app->security->generatePasswordHash($pass);
        }

        $user->updated_at = time();

        if ($user->save() && $user->assignRole(UserRole::ROLE_ADMIN)) {
            echo "username: admin\r\n";
            echo "password: {$pass}\r\n";
        } else {
            $user->delete();
            echo "Error";
        }
    }
}