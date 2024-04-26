<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

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
