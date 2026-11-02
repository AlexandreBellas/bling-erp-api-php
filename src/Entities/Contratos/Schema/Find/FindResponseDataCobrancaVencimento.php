<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\CobrancaVencimentoTipo;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\CobrancaVencimentoPeriodicidade;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataCobrancaVencimento extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Enum\CobrancaVencimentoTipo $tipo
     * @param ?int $dia
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Enum\CobrancaVencimentoPeriodicidade $periodicidade
     */
    public function __construct(
        public ?CobrancaVencimentoTipo $tipo,
        public ?int $dia,
        public ?CobrancaVencimentoPeriodicidade $periodicidade,
    ) {
    }
}
