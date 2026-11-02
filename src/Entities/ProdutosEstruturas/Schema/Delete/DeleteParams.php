<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Delete;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class DeleteParams extends QueryParams
{
    /**
     * @param array $idsProdutos
     */
    public function __construct(
        public array $idsProdutos,
    ) {
        parent::__construct(objectToArray($this));
    }
}
