<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataItensProduto extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $codigo
     */
    public function __construct(
        public int $id,
        public ?string $codigo,
    ) {
    }
}
