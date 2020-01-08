<?php

namespace TipsTricks\View;

/**
 * Example
 * <div class="<?= ClassNames::from(['solid' => true, 'red' => false, 'large' => true]) ?>"></div>
 * <div class="<?= ClassNames::from(['solid', 'red' => false, 'large' => true]) ?>"></div>
 * <div class="<?= ClassNames::from('solid', ['red' => false, 'large' => true]) ?>"></div>
 *
 * Result
 * <div class="solid large"></div>
 *
 */
class ClassNames
{
    private $classNames = [];

    private function __construct($params)
    {
        foreach ($params as $param) {
            if (!is_array($param)) {
                $param = [$param];
            }
            $this->extract($param);
        }
    }

    private function extract(array $classes)
    {
        foreach($classes as $index => $value) {
            if (is_numeric($index) && is_string($value)) {
                $this->classNames[] = $value;
            } elseif (is_string($index) && $value === true) {
                $this->classNames[] = $index;
            }
        }
    }

    public static function from(...$params)
    {
        return new self($params);
    }

    public function __toString()
    {
        return implode(' ', $this->classNames);
    }
}