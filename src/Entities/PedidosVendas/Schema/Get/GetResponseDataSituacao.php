<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\Situacao;

readonly final class GetResponseDataSituacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param Situacao $valor
     */
    public function __construct(
        public int $id,
        public Situacao $valor
    ) {
    }
}
