<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataComissoes extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param float $descontoMaximo
     * @param float $aliquota
     */
    public function __construct(
        public float $descontoMaximo,
        public float $aliquota,
    ) {
    }
}
