<?php

use TipsTricks\QueryBuilder\Column;
use TipsTricks\QueryBuilder\From;
use TipsTricks\QueryBuilder\Query;
use TipsTricks\QueryBuilder\Select;
use TipsTricks\QueryBuilder\Where;

class QueryTest extends \PHPUnit\Framework\TestCase
{
    public function testQuery()
    {
        $selects = [
            new Column("SUM(order.price)", "total"),
            new Column("customer.name"),
        ];

        $from = new From('order');

        $select = new Select($selects);

        $where = new Where();
        $query = new Query($select, $from, $where);

        $sql = <<<SQL

SELECT
    SUM(order.price) AS total,
    customer.name
FROM order
    JOIN customer ON order.customer_id = customer.id
WHERE customer.id = 14
;
SQL;
         self::assertSame($sql, (string) $query);
    }
}