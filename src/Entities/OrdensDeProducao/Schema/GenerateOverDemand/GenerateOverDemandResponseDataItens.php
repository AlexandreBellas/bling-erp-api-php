<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GenerateOverDemandResponseDataItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?GenerateOverDemandResponseDataItensProduto $produto
     * @param ?float $quantidade
     */
    public function __construct(
        public ?GenerateOverDemandResponseDataItensProduto $produto,
        public ?float $quantidade,
    ) {}
}
