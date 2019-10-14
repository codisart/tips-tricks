<?php


namespace TipsTricks\QueryBuilder;


class From
{
    private $expression;

    public function __construct(string $expression)
    {
        $this->expression = $expression;
    }

    public function __toString()
    {
        return "FROM " . $this->expression . PHP_EOL;
    }
}