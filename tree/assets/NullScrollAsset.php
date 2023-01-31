<?php

namespace tree\assets;

use yii\web\AssetBundle;

/**
 * Main tree application asset bundle.
 */
class NullScrollAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/nullscroll.css?v=1',
    ];
    public $js = [
    ];
    public $depends = [
    ];
}
