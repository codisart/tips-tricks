<?php

namespace TipsTricks\Repo;

use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select as SqlSelect;

class Select extends SqlSelect
{
    public function joinLeft($name, $on, $columns)
    {
        return parent::join($name, $on, $columns, parent::JOIN_LEFT);
    }

    public function whereCondition(Expression $expression)
    {
        $this->where->expression(
            $expression->getExpression()
        );
    }
}