<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataDesconto extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param float $valor
     * @param string $dataFim
     */
    public function __construct(
        public float $valor,
        public string $dataFim,
    ) {
    }
}
