<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\ChangeSituationMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error;

/**
 * Dados da resposta.
 */
readonly final class ChangeSituationManyResponseDataAlertas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error $error
     */
    public function __construct(
        public ?int $id,
        public ?Error $error,
    ) {
    }
}
