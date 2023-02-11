<?php

use common\helpers\Add;
use common\models\User;
use common\widgets\AddButton;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var User[] $users */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-index">
    <div class="row">

        <div class="offset-lg-8 col-lg-2">
            <?php
            $add = new Add("Add user", '/user/create');

            echo AddButton::widget([
                'add' => $add,
                'multiple' => false
            ]);
            ?>
        </div>
        <?php if ($users) : ?>
            <div class="offset-md-3 col-md-6">
                <?php foreach ($users as $user) : ?>
                    <a class="nav-link btn text-center btn-light m-2 p-2"
                       href="<?= Url::to(['user/update?id=' . $user->id]); ?>">
                        <?= $user->username ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
