<?php

namespace TipsTricks\Repo\Condition;

use Zend\Db\Sql\Expression;

class AndSql extends Expression
{
    private $parts = [];

    public function orSql(OrSql $expression)
    {
        $this->appendExpression($expression);
    }

    public function equals($left, $right)
    {
        $this->appendExpression(new Equals($left, $right));
        return $this;
    }

    private function appendExpression(Expression $expression)
    {
        $this->parts[] = '('. $expression->getExpression() .')';
        $this->expression = implode(' AND ', $this->parts);
    }
}
