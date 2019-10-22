<?php

namespace TipsTricks\Repo;

use TipsTricks\Repo\Condition\AndSql;

class Condition
{
    public static function andSql()
    {
        return new AndSql();
    }

}