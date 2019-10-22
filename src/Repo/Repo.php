<?php

namespace TipsTricks\Repo;

use TipsTricks\Repo\On\Equals as Equals;
use Zend\Db\Sql\Select;

class Repo
{
    /**
     * return Entity[]
     */
    public function findByUuidLargerThan4()
    {
        $resas = new TableIdentifier('resa', 'schema');
        $vehicles = new TableIdentifier('vehicle', 'schema');
        $transactions = new TableIdentifier('transaction', 'schema');

        $resaId = $resas->column('uuid');
        $vehicleId = $vehicles->column('resa_id');
        $transactionId = $transactions->column('resa_id');

        $select = (new Select())
            ->from($resas)
            ->join($vehicles, new Equals($resaId, $vehicleId))
            ->join($transactions, new Equals($resaId, $transactionId))
            ;


        $plop = new Columns(Entity::class, [
            $resas->column('uuid'),
            $resas->column('first_name'),
            $vehicles->column('plaque')
        ]);

        $where = new Where('uuid > 4');

        return new Select($columns, $jointure, $where);
    }
}
}