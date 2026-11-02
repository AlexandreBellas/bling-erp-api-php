<?php

namespace AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ValidateHash;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class ValidateHashParams extends QueryParams
{
    /**
     * @param string $hash
     */
    public function __construct(
        public string $hash,
    ) {
        parent::__construct(objectToArray($this));
    }
}
