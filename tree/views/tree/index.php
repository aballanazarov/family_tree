<?php

/** @var yii\web\View $this */

/** @var Tree[] $trees */

use tree\models\Tree;
use yii\helpers\Url;

$this->title = 'Trees';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tree-index">
    <div class="row">
        <div class="offset-lg-8 col-lg-2">
            <a class="nav-link btn text-center btn-secondary m-2 p-2" href="<?= Url::to(['tree/create']); ?>">Create</a>
        </div>
        <?php if ($trees) : ?>
            <div class="offset-md-3 col-md-6">
                <?php foreach ($trees as $tree) : ?>
                    <a class="nav-link btn text-center btn-light m-2 p-2"
                       href="<?= Url::to(['tree/update?id=' . $tree->id]); ?>">
                        <?= $tree->name ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
