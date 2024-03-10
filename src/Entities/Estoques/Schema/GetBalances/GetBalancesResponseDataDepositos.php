<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetBalancesResponseDataDepositos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?float $saldoFisico
     * @param ?float $saldoVirtual
     */
    public function __construct(
        public int $id,
        public ?float $saldoFisico,
        public ?float $saldoVirtual,
    ) {
    }
}
