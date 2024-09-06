<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?FindResponseItensProduto $produto
     * @param ?float $quantidade
     */
    public function __construct(
        public ?FindResponseItensProduto $produto,
        public ?float $quantidade,
    ) {}
}
