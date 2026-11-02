<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class UpdateResponseDataRastreamento extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $description
     */
    public function __construct(
        public ?string $description,
    ) {
    }
}
