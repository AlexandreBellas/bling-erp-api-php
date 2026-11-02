<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataComponentes extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $produto
     * @param float $quantidade
     */
    public function __construct(
        public Id $produto,
        public float $quantidade,
    ) {
    }
}
