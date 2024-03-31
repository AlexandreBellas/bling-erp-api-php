<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataItensComissao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $base
     * @param ?float $aliquota
     * @param ?float $valor
     */
    public function __construct(
        public ?float $base,
        public ?float $aliquota,
        public ?float $valor,
    ) {
    }
}
