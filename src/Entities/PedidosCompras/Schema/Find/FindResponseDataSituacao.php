<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosCompras\Enum\Situacao;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataSituacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\PedidosCompras\Enum\Situacao $valor
     */
    public function __construct(
        public Situacao $valor
    ) {
    }
}
