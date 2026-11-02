<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataTributacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $totalICMS
     * @param ?float $totalIPI
     */
    public function __construct(
        public ?float $totalICMS,
        public ?float $totalIPI,
    ) {
    }
}
