<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\DeleteComponents;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class DeleteComponentsParams extends QueryParams
{
    /**
     * @param array $idsComponentes
     */
    public function __construct(
        public array $idsComponentes,
    ) {
        parent::__construct(objectToArray($this));
    }
}
