<?php


namespace TipsTricks\QueryBuilder;


class Column
{
    private $expression;
    private $alias;

    public function __construct(string $expression, string $alias = null)
    {
        $this->expression = $expression;
        $this->alias = $alias;
    }

    public function __toString()
    {
        if ($this->alias) {
            return Query::INDENT . $this->expression . ' AS ' . $this->alias;
        }
        return Query::INDENT . $this->expression;
    }
}