<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class CreateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $numero
     * @param ?string[] $alertas
     * @param ?string[] $errosAnexo
     */
    public function __construct(
        public int $id,
        public string $numero,
        public ?array $alertas,
        public ?array $errosAnexo,
    ) {
    }
}
