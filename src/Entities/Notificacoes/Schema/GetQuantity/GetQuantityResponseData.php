<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\GetQuantity;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetQuantityResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $quantidade
     */
    public function __construct(
        public ?int $quantidade,
    ) {
    }
}
