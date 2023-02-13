<?php

use common\widgets\Button;
use common\widgets\Input;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\bootstrap5\ActiveForm $form */

vd($model->attributes);
vd($model->errors);
?>

<?php
$form = ActiveForm::begin([
    'options' => [
        'class' => ['row']
    ],
]);
?>


<?=
Input::widget([
    'label' => 'Username',
    'placeholder' => 'Username',
    'name' => 'User[username]',
    'value' => $model->username,
    'maxlength' => 255,
    'errors' => $model->getErrors('username'),
]);
?>


<?php if (can('admin') && !isset($update)) : ?>
    <?=
    Input::widget([
        'label' => 'Password',
        'placeholder' => 'Password',
        'name' => 'User[new_password]',
        'value' => $model->new_password ?? null,
        'maxlength' => 255,
        'errors' => $model->getErrors('new_password'),
        'type' => 'password',
    ]);
    ?>
<?php endif; ?>


<?=
Input::widget([
    'label' => 'Email',
    'placeholder' => 'Email',
    'name' => 'User[email]',
    'value' => $model->email,
    'maxlength' => 255,
    'errors' => $model->getErrors('email'),
]);
?>

<?php
ActiveForm::end();
?>

<?=
Button::widget([
    'label' => 'Сохранить',
    'type' => 'submit',
    'formId' => $form->getId(),
])
?>

<?php if (isset($update) && $update && !empty($model->id)) : ?>
    <?=
    Button::widget([
        'label' => 'Отмена',
        'type' => 'cancel',
        'formId' => $form->getId(),
        'classList' => 'btn-warning',
    ]);
    ?>

    <?=
    Html::a(Yii::t('app', 'Удалить'), ['delete', 'id'=>$model->id], [
        'class' => 'btn mb-3 btn-danger',
        'data' => [
            'method'=>'POST',
            'confirm'=>Yii::t('app', 'Вы уверен ?'),
        ],
    ])
    ?>
<?php endif; ?>
