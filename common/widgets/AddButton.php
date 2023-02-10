<?php

namespace common\widgets;

use common\helpers\Add;
use rmrevin\yii\fontawesome\FA;
use Yii;
use yii\bootstrap5\Widget;

class AddButton extends Widget
{
    public string $name;
    public ?array $adds = null;
    public ?Add $add = null;
    public bool $icon = false;
    public bool $multiple = true;

    public $layout = [
        'content' => <<<HTML
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="{{viewId}}" data-bs-toggle="dropdown" aria-expanded="false">
        {{icon}} {{name}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="{{viewId}}">
        {{items}}
    </ul>
</div>

<div class="py-4">
    <div class="dropdown">
        <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
        </button>
        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
            
        </div>
    </div>
</div>
HTML,

        'single' => <<<HTML
<a href="{{link}}" class="btn text-center btn-primary m-2 p-2">
    {{icon}} {{name}}
</a>
HTML,

        'item' => <<<HTML
<li>
    <a class="dropdown-item" href="{{link}}">
        {{icon}} {{name}}
    </a>
</li>
HTML,
    ];

    public function run()
    {

        $icon = FA::icon('plus');

        if ($this->multiple) {
            $items = "";

            foreach ($this->adds as $add) {
                $items .= strtr($this->layout['item'], [
                    '{{link}}' => $add->link,
                    '{{icon}}' => $icon,
                    '{{name}}' => $add->name,
                ]);
            }

            echo strtr($this->layout['content'], [
                '{{icon}}' => $icon,
                '{{name}}' => $this->name,
                '{{items}}' => $items,
                '{{viewId}}' => $this->getId(),
            ]);
        } else {
            echo strtr($this->layout['single'], [
                '{{icon}}' => $icon,
                '{{name}}' => $this->add->name,
                '{{link}}' => $this->add->link,
            ]);
        }
    }
}
