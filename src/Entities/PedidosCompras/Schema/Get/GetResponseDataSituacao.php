<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosCompras\Enum\Situacao;

readonly final class GetResponseDataSituacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param Situacao $valor
     */
    public function __construct(
        public Situacao $valor
    ) {
    }
}
