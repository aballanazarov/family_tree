<?php

/** @var yii\web\View $this */

/** @var Tree[] $trees */

use common\widgets\TreeContent;
use tree\models\Tree;

$this->title = 'My Yii Application';
?>
<div class="tree">

    <?php if ($trees) : ?>
        <?= TreeContent::widget([
            'trees' => $trees
        ]) ?>
    <?php endif; ?>

</div>