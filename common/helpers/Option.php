<?php

namespace common\helpers;

class Option
{
    public string $value;
    public string $label;
    public bool $isActive;

    /**
     * @param string $value
     * @param string $label
     * @param bool $isActive
     */
    public function __construct(
        string $value,
        string $label,
        bool $isActive = false
    )
    {
        $this->value = $value;
        $this->label = $label;
        $this->isActive = $isActive;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}