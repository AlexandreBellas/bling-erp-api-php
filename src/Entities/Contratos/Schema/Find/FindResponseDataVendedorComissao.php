<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataVendedorComissao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param float $aliquota
     * @param int $numeroParcelas
     */
    public function __construct(
        public float $aliquota,
        public int $numeroParcelas,
    ) {
    }
}
