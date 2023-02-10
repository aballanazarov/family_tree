<?php

namespace common\widgets;

use yii\bootstrap5\Widget;

class Button extends Widget
{
    public string $label;
    public ?string $formId;
    public string $type = "button";
    public string $name = "submit";
    public string $classList = "btn-primary";

    public $layout = [
        'content' => <<<HTML
        <button class="btn mb-3 {{class}}" type="{{type}}" {{formId}}>{{label}}</button>
HTML,

        'formId' => <<<HTML
form="{{formId}}"
HTML,
        ];

    public function run()
    {
        echo strtr($this->layout['content'], [
            '{{class}}' => $this->classList,
            '{{type}}' => $this->type,
            '{{label}}' => $this->label,
            '{{formId}}' => $this->formId ? strtr($this->layout['formId'], ['{{formId}}' => $this->formId]) : "",
        ]);
    }
}