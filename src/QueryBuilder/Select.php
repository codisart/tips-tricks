<?php

namespace TipsTricks\QueryBuilder;

class Select
{
    private $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function __toString()
    {
        $select = implode(",\n", $this->columns);
        return PHP_EOL . "SELECT" . PHP_EOL . $select;
    }
}