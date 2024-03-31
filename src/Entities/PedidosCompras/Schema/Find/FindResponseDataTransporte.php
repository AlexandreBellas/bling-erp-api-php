<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosCompras\Enum\FretePorConta;

readonly final class FindResponseDataTransporte extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $frete
     * @param ?string $transportador
     * @param ?FretePorConta $fretePorConta
     * @param ?float $pesoBruto
     * @param ?int $volumes
     */
    public function __construct(
        public ?float $frete,
        public ?string $transportador,
        public ?FretePorConta $fretePorConta,
        public ?float $pesoBruto,
        public ?int $volumes,
    ) {
    }
}
