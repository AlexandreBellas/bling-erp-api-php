<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\DescontoUnidade;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataDesconto extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param float $valor
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\DescontoUnidade $unidade
     */
    public function __construct(
        public float $valor,
        public ?DescontoUnidade $unidade,
    ) {
    }
}
