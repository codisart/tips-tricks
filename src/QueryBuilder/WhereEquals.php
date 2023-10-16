<?php


namespace TipsTricks\QueryBuilder;


class WhereEquals
{
    private $one;
    private $two;

    public function __construct($one, $two)
    {
        $this->one = $one;
        $this->two = $two;
    }

    public function __toString()
    {
        return $this->one . ' = ' . $this->two;
    }
}
