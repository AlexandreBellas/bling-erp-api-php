<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\NotaFiscalMes;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\NotaFiscalGerar;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\NotaFiscalDescontarImpostoRenda;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataNotaFiscal extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Enum\NotaFiscalMes $mes
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Enum\NotaFiscalGerar $gerar
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Enum\NotaFiscalDescontarImpostoRenda $descontarImpostoRenda
     * @param ?string $texto
     * @param ?string $cfop
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find\FindResponseDataNotaFiscalIss $iss
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find\FindResponseDataNotaFiscalItem $item
     */
    public function __construct(
        public ?NotaFiscalMes $mes,
        public ?NotaFiscalGerar $gerar,
        public ?NotaFiscalDescontarImpostoRenda $descontarImpostoRenda,
        public ?string $texto,
        public ?string $cfop,
        public ?FindResponseDataNotaFiscalIss $iss,
        public ?FindResponseDataNotaFiscalItem $item,
    ) {
    }
}
