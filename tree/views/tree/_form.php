<?php

use common\helpers\Option;
use common\services\DateTimeHelper;use common\widgets\Button;
use common\widgets\Input;
use common\widgets\Select;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Tree $model */
/** @var common\models\Tree[] $people */
/** @var yii\widgets\ActiveForm $form */
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
    'label' => 'Ф.И.Ш.',
    'placeholder' => 'Ф.И.Ш.',
    'name' => 'Tree[name]',
    'value' => $model->name,
    'maxlength' => 255,
    'errors' => $model->getErrors('name'),
]);
?>

<?=
Input::widget([
    'label' => 'Birthday',
    'placeholder' => 'DD.MM.YYYY',
    'name' => 'Tree[birthday]',
    'value' => !empty($model->birthday) && is_int($model->birthday) ? DateTimeHelper::timeToStr($model->birthday) : $model->birthday,
    'errors' => $model->getErrors('birthday'),
    'type' => 'date',
//    'min' => '01.01.1000',
//    'max' => '02.02.2023',
]);
?>

<?=
Input::widget([
    'label' => 'Death Date',
    'placeholder' => 'Death Date',
    'name' => 'Tree[death_date]',
    'value' => !empty($model->death_date) && is_int($model->death_date) ? DateTimeHelper::timeToStr($model->death_date) : $model->death_date,
    'errors' => $model->getErrors('death_date'),
    'type' => 'date',
]);
?>

<?=
Input::widget([
    'label' => 'Spouse Ф.И.Ш.',
    'placeholder' => 'Spouse Ф.И.Ш.',
    'name' => 'Tree[spouse_name]',
    'value' => $model->spouse_name,
    'maxlength' => 255,
    'errors' => $model->getErrors('spouse_name'),
]);
?>

<?=
Input::widget([
    'label' => 'Spouse Birthday',
    'placeholder' => 'Spouse Birthday',
    'name' => 'Tree[spouse_birthday]',
    'value' => !empty($model->spouse_birthday) && is_int($model->spouse_birthday) ? DateTimeHelper::timeToStr($model->spouse_birthday) : $model->spouse_birthday,
    'errors' => $model->getErrors('spouse_birthday'),
    'type' => 'date',
]);
?>

<?=
Input::widget([
    'label' => 'Spouse Death Date',
    'placeholder' => 'Spouse Death Date',
    'name' => 'Tree[spouse_death_date]',
    'value' => !empty($model->spouse_death_date) && is_int($model->spouse_death_date) ? DateTimeHelper::timeToStr($model->spouse_death_date) : $model->spouse_death_date,
    'errors' => $model->getErrors('spouse_death_date'),
    'type' => 'date',
]);
?>

<?php
$options = [];

foreach ($people as $person) {
    $options[] = new Option($person->id, $person->name, !empty($model->parent_id) && $person->id == $model->parent_id);
}

echo Select::widget([
    'label' => 'Родители',
    'name' => 'Tree[parent_id]',
    'items' => $options,
    'errors' => $model->getErrors('parent_id'),
    'firstOption' => true,
    'firstOptionLabel' => 'Not select',
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
