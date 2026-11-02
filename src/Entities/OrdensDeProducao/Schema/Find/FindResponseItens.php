<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find\FindResponseItensProduto $produto
     * @param ?float $quantidade
     */
    public function __construct(
        public ?FindResponseItensProduto $produto,
        public ?float $quantidade,
    ) {}
}
