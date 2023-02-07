<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var tree\models\Tree $model */

$this->title = 'Update Tree: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Trees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tree-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php if (!empty($model->id)) : ?>
        <?php $delete = ActiveForm::begin(['method' => 'POST', 'action' => '/tree/delete?id=' . $model->id]) ?>
            <?= Html::submitButton('Delete', ['class' => 'btn btn-danger']) ?>
        <?php ActiveForm::end() ?>
    <?php endif; ?>
</div>
