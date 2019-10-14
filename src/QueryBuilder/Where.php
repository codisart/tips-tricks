<?php


namespace TipsTricks\QueryBuilder;


class Where
{
    public function __toString()
    {
        return "WHERE " . new WhereEquals('customer.id', '14');
    }
}