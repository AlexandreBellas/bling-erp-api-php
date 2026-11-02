<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseImpostosIR extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $percentual
     * @param ?float $valorMinimoAlternativoDescontol
     * @param ?bool $descontar
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseImpostosIRTexto $texto
     */
    public function __construct(
        public ?float $percentual,
        public ?float $valorMinimoAlternativoDescontol,
        public ?bool $descontar,
        public ?GetConfigurationsResponseImpostosIRTexto $texto,
    ) {
    }
}
