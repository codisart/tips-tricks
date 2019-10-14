<?php


namespace TipsTricks\QueryBuilder;


class Join
{
    private $table;

    private $condition;

    public function __construct($table)
    {
        $this->table = $table;
    }

    private function conditions() {
        return " ON order.customer_id = customer.id";
    }

    public function __toString()
    {
        return Query::INDENT . "JOIN " . $this->table . $this->conditions();
    }
}