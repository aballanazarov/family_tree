<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tree $model */
/** @var common\models\Tree[] $people */

$this->title = 'Add new People';
$this->params['breadcrumbs'][] = ['label' => 'Trees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'people' => $people,
    ]) ?>

</div>
