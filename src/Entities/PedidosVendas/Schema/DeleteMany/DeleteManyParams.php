<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class DeleteManyParams extends QueryParams
{
    /**
     * @param array $idsPedidosVendas
     */
    public function __construct(
        public array $idsPedidosVendas,
    ) {
        parent::__construct(objectToArray($this));
    }
}
