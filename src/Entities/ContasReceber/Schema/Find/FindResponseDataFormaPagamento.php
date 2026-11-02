<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\CodigoFiscal;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataFormaPagamento extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?\AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\CodigoFiscal $codigoFiscal
     */
    public function __construct(
        public int $id,
        public ?CodigoFiscal $codigoFiscal,
    ) {
    }
}
