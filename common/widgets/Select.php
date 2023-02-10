<?php

namespace common\widgets;

use yii\bootstrap5\Widget;
use common\helpers\Option;

class Select extends Widget
{
    public string $label;
    public string $name;
    public array $items;
    public ?array $errors = null;
    public bool $firstOption = false;
    public string $firstOptionLabel = "";

    public $layout = [
        'content' => <<<HTML
<div class="col-md-6 col-lg-4 mb-3">
    <label for="{{viewId}}" class="form-label">{{label}}</label>
    <select class="form-select" aria-label="{{label}}" name="{{name}}" id="{{viewId}}">
        {{items}}
    </select>
    {{error}}
</div>
HTML,

        'first' => <<<HTML
    <option selected disabled>{{firstOptionLabel}}</option>
HTML,

        'item' => <<<HTML
<option value="{{value}}" {{isSelected}}>
    {{label}}
</option>
HTML,

        'error' => <<<HTML
<span class="text-danger"> {{errorMessage}} </span>
HTML,
    ];

    public function run()
    {
        $items = "";

        if ($this->firstOption) {
            $items .= strtr($this->layout['first'], [
                '{{firstOptionLabel}}' => $this->firstOptionLabel,
            ]);
        }

        foreach ($this->items as $option) {
            $items .= strtr($this->layout['item'], [
                '{{value}}' => $option->value,
                '{{label}}' => $option->label,
                '{{isSelected}}' => $option->isActive ? "selected" : "",
            ]);
        }

        echo strtr($this->layout['content'], [
            '{{viewId}}' => $this->getId(),
            '{{label}}' => $this->label,
            '{{name}}' => $this->name,
            '{{items}}' => $items,
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