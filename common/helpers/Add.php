<?php

namespace common\helpers;

use rmrevin\yii\fontawesome\component\Icon;
use rmrevin\yii\fontawesome\FA;

class Add
{
    public string $link;
    public string $name;

    /**
     * @param string $link
     * @param string $name
     */
    public function __construct(
        string $name = "-",
        string $link = "#"
    )
    {
        $this->name = $name;
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}