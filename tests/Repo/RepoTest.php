<?php

namespace TipsTricks\Repo;

use PHPUnit\Framework\TestCase;
use TipsTricks\Repo\Condition\Equals;
use Zend\Db\Adapter\Platform\Postgresql;
use Zend\Db\Sql\Expression;

class RepoTest extends TestCase
{
    public function testSelect()
    {
        $select = new Select();

        $select->columns([
            'title'           ,
            'officer'    ,
            'reference',
        ]);

        $designs = new TableIdentifier('asset_design', 'mis');
        $invoices = new TableIdentifier('invoice', 'public');

        $designJoinCondition = Condition::AndSql()
            ->equals($designs->column('id'), $invoices->column('asset_id'))
            ->equals($invoices->column('asset_type'), 'design');

        $select->from($designs);

        $select->joinLeft(
            $invoices,
            $designJoinCondition,
            []
        );

        $select->where->equalTo(
            $invoices->column('owner_id'), 4
        );

        $platform = new class extends Postgresql
        {
            public function quoteValue($value)
            {
                return $value;
            }
        };
        self::assertSame(
            'SELECT "mis"."asset_design"."title" AS "title", "mis"."asset_design"."officer" AS "officer", "mis"."asset_design"."reference" AS "reference" FROM "mis"."asset_design" LEFT JOIN "public"."invoice" ON ("mis"."asset_design".id = "public"."invoice".asset_id) AND ("public"."invoice".asset_type = design) WHERE "public"."invoice".owner_id = 4',
            $select->getSqlString($platform)
        );
    }
}