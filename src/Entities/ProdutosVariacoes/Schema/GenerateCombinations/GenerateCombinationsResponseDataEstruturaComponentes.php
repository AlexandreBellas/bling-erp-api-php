<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class GenerateCombinationsResponseDataEstruturaComponentes extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param Id $produto
     * @param float $quantidade
     */
    public function __construct(
        public Id $produto,
        public float $quantidade,
    ) {
    }
}
