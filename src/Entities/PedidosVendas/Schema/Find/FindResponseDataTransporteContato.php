<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataTransporteContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $nome
     */
    public function __construct(
        public ?int $id,
        public string $nome,
    ) {
    }
}
