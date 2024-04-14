<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error;

readonly final class DeleteManyResponseDataAlertas extends BaseResponseObject
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
