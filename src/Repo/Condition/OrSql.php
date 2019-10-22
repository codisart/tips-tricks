<?php

namespace TipsTricks\Repo\Condition;

use Zend\Db\Sql\Expression;

class OrSql extends Expression
{
    public function andSql(AndSql $expression)
    {
        $this->appendExpression($expression);
    }

    public function equals(Expression $left, Expression $right)
    {
        $this->appendExpression(new Equals($left, $right));
    }

    private function appendExpression(Expression $expression)
    {
        $this->expression .= ' OR ('. $expression->getExpression() .')';
    }
}
