<?php

namespace common\widgets;

use yii\bootstrap5\Widget;

class Tree extends Widget
{
    public ?int $user_id = null;

    private $layout = [
        'content' => <<<HTML
<ul>
    <li>
        <p>{name} ({birthday} - {death_date})
        <br/>{name} ({birthday})</p>
        {children}
    </li>
</ul>
HTML,
        'children'
    ];

    public function run()
    {

    }
}