<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataIntermediador extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $cnpj
     * @param ?string $nomeUsuario
     */
    public function __construct(
        public ?string $cnpj,
        public ?string $nomeUsuario,
    ) {
    }
}
