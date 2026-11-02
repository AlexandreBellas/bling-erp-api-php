<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseControle extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseControleNumeracaoRPS $numeracaoRPS
     */
    public function __construct(
        public ?GetConfigurationsResponseControleNumeracaoRPS $numeracaoRPS
    ) {
    }
}
