<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class DeleteManyParams extends QueryParams
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
