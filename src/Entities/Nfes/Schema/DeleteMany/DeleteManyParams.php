<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class DeleteManyParams extends QueryParams
{
    /**
     * @param array $idsNotas
     */
    public function __construct(
        public array $idsNotas,
    ) {
        parent::__construct(objectToArray($this));
    }
}
