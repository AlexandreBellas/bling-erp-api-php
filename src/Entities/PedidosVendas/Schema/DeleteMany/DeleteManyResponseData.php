<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class DeleteManyResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param array $alertas
     */
    public function __construct(
        public array $alertas,
    ) {
    }
}
