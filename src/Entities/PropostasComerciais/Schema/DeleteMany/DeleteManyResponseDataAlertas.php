<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error;

/**
 * Dados da resposta.
 */
readonly final class DeleteManyResponseDataAlertas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error $error
     */
    public function __construct(
        public ?Error $error,
    ) {}
}
