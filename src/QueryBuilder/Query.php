<?php

namespace TipsTricks\QueryBuilder;

class Query
{
    const INDENT = "    ";

    const FINAL_POINT = ";";

    private $select;
    private $from;
    private $where;

    public function __construct(Select $select, From $from, Where $where)
    {
        $this->select = $select;
        $this->from   = $from;
        $this->where  = $where;
    }

    public function __toString()
    {
        $parts = [
            $this->select,
            $this->from(),
            $this->where,
            Query::FINAL_POINT,
        ];

        return implode("\n", $parts);
    }

    private function from()
    {
        return $this->from . (new Join('customer'));
    }
}

