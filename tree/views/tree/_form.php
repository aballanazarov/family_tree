<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var tree\models\Tree $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tree-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row mb-3">
        <div class="col-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('И.Ф.Ш.') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'birthday')->textInput() ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'death_date')->textInput() ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'spouse_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'spouse_birthday')->textInput() ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'spouse_death_date')->textInput() ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'parent_id')->textInput() ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'created_at')->textInput() ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'updated_at')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
