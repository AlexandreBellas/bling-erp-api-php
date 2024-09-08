<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error;

readonly final class DeleteManyResponseDataAlertas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?Error $error
     */
    public function __construct(
        public ?Error $error,
    ) {}
}
