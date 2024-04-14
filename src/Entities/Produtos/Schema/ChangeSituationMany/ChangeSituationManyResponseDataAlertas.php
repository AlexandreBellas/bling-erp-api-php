<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\ChangeSituationMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error;

readonly final class ChangeSituationManyResponseDataAlertas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?Error $error
     */
    public function __construct(
        public ?int $id,
        public ?Error $error,
    ) {
    }
}
