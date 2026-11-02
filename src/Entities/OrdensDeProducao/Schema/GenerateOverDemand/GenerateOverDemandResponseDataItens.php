<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GenerateOverDemandResponseDataItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand\GenerateOverDemandResponseDataItensProduto $produto
     * @param ?float $quantidade
     */
    public function __construct(
        public ?GenerateOverDemandResponseDataItensProduto $produto,
        public ?float $quantidade,
    ) {}
}
