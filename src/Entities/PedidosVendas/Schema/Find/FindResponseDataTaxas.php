<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataTaxas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $taxaComissao
     * @param ?float $custoFrete
     * @param ?float $valorBase
     */
    public function __construct(
        public ?float $taxaComissao,
        public ?float $custoFrete,
        public ?float $valorBase,
    ) {
    }
}
