<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\CodigoFiscal;

readonly final class GetResponseDataFormaPagamento extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?CodigoFiscal $codigoFiscal
     */
    public function __construct(
        public int $id,
        public ?CodigoFiscal $codigoFiscal,
    ) {
    }
}
