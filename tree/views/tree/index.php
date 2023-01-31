<?php

/** @var yii\web\View $this */

/** @var Tree[] $trees */

use tree\models\Tree;

$this->title = 'Trees';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tree-index">
    <div class="row">
        <?php if (!$trees) : ?>
            <?php foreach ($trees as $tree) : ?>
                <div class="col-12">
                    <?= $tree->name ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
