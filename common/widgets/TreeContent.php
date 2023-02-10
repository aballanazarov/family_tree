<?php

namespace common\widgets;

use common\models\Tree;
use yii\bootstrap5\Widget;

class TreeContent extends Widget
{
    /**
     * @var Tree[]
     */
    public ?array $trees = null;

    private $layout = [
        'content' => <<<HTML
<ul>
    {list}
</ul>
HTML,

        'child' => <<<HTML
    <li>
        <p>{name} ({birthday} - {deathDate})
        <br/>{spouseName} ({spouseBirthday} - {spouseDeathDate})</p>
        {children}
    </li>
HTML,
    ];

    public function run()
    {
        $list = "";

        if (!empty($this->trees)) {
            foreach ($this->trees as $tree) {
                $children = $tree->trees;

                $list .= strtr($this->layout['child'], [
                    '{name}' => $tree->name,
                    '{birthday}' => $tree->birthday,
                    '{deathDate}' => $tree->death_date,
                    '{spouseName}' => $tree->spouse_name,
                    '{spouseBirthday}' => $tree->spouse_birthday,
                    '{spouseDeathDate}' => $tree->spouse_death_date,
                    '{children}' => TreeContent::widget([
                        'trees' => $children,
                    ]),
                ]);
            }
            return strtr($this->layout['content'],[
                '{list}' => $list,
            ]);
        }
        return "";
    }
}