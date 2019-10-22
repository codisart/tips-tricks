<?php

namespace TipsTricks\Repo\Condition;

use Zend\Db\Sql\Expression;

class Equals extends Expression
{
    public function __construct($left, $right)
    {
        $left = $this->castAsExpression($left);
        $right = $this->castAsExpression($right);

        $expression = sprintf('%s = %s', $left->getExpression(), $right->getExpression());
        parent::__construct($expression);
    }

    private function castAsExpression($expression) : Expression
    {
        if (!is_a($expression, Expression::class)) {
            return new Expression($expression);
        }
        return $expression;
    }
}