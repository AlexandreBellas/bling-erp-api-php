<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseImpostos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?bool $bloquearRetencaoPessoaFisica
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseImpostosIR $IR
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseImpostosOutros $outros
     */
    public function __construct(
        public ?bool $bloquearRetencaoPessoaFisica,
        public ?GetConfigurationsResponseImpostosIR $IR,
        public ?GetConfigurationsResponseImpostosOutros $outros,
    ) {
    }
}
