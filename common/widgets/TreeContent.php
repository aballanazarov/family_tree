<?php

namespace common\widgets;

use common\models\Tree;
use common\services\DateTimeHelper;
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
                    '{name}' =>
                        $tree->name,
                    '{birthday}' =>
                        !empty($tree->birthday) && is_int($tree->birthday)
                            ? DateTimeHelper::timeToStr($tree->birthday, "d.m.Y")
                            : $tree->birthday,
                    '{deathDate}' =>
                        !empty($tree->death_date) && is_int($tree->death_date)
                            ? DateTimeHelper::timeToStr($tree->death_date, "d.m.Y")
                            : $tree->death_date,
                    '{spouseName}' =>
                        $tree->spouse_name,
                    '{spouseBirthday}' =>
                        !empty($tree->spouse_birthday) && is_int($tree->spouse_birthday)
                            ? DateTimeHelper::timeToStr($tree->spouse_birthday, "d.m.Y")
                            : $tree->spouse_birthday,
                    '{spouseDeathDate}' =>
                        !empty($tree->spouse_death_date) && is_int($tree->spouse_death_date)
                            ? DateTimeHelper::timeToStr($tree->spouse_death_date, "d.m.Y")
                            : $tree->spouse_death_date,
                    '{children}' =>
                        TreeContent::widget([
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