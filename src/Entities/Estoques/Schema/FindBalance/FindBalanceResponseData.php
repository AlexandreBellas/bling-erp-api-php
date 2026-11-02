<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Schema\FindBalance;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindBalanceResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $produto
     * @param ?float $saldoFisicoTotal
     * @param ?float $saldoVirtualTotal
     */
    public function __construct(
        public ?Id $produto,
        public ?float $saldoFisicoTotal,
        public ?float $saldoVirtualTotal,
    ) {
    }
}
