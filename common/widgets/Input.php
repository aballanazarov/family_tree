<?php

namespace common\widgets;

use yii\bootstrap5\Widget;
use common\helpers\Option;

class Input extends Widget
{
    public string $label;
    public string $placeholder;
    public string $name;
    public ?string $value;
    public ?int $maxlength = null;
    public ?string $min = null;
    public ?string $max = null;
    public ?array $errors = null;
    public string $type = 'text';

    public $layout = [
        'content' => <<<HTML
<div class="col-md-6 col-lg-4 mb-3">
    <label for="{{viewId}}" class="form-label">{{label}}</label>
    <input 
        type="{{type}}" 
        class="form-control" 
        name="{{name}}" 
        id="{{viewId}}" 
        placeholder="{{placeholder}}" 
        {{maxlength}}
        {{min}}
        {{max}}
        {{value}}
    >
    {{error}}
</div>
HTML,

        'value' => <<<HTML
value="{{value}}"
HTML,

        'maxlength' => <<<HTML
maxlength="{{maxlength}}"
HTML,

        'error' => <<<HTML
<span class="text-danger"> {{errorMessage}} </span>
HTML,
    ];

    public function run()
    {
        echo strtr($this->layout['content'], [
            '{{viewId}}' => $this->getId(),
            '{{label}}' => $this->label,
            '{{placeholder}}' => $this->placeholder,
            '{{name}}' => $this->name,
            '{{value}}' => $this->value ? strtr($this->layout['value'], ['{{value}}' => $this->value]) : "",
            '{{maxlength}}' => $this->maxlength ? strtr($this->layout['maxlength'], ['{{maxlength}}' => $this->maxlength]) : "",
            '{{type}}' => $this->type,
            '{{error}}' => $this->getErrorMessage($this->errors),
        ]);
    }

    private function getErrorMessage(?array $errors): string
    {
        $result = "";
        if ($errors) {
            foreach ($errors as $error) {
                $result .= strtr($this->layout['error'], ['{{errorMessage}}' => $error]);
            }
        }

        return $result;
    }
}