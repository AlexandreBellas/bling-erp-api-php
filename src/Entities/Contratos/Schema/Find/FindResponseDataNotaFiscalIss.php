<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataNotaFiscalIss extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?bool $descontar
     * @param ?float $aliquota
     */
    public function __construct(
        public ?bool $descontar,
        public ?float $aliquota,
    ) {
    }
}
