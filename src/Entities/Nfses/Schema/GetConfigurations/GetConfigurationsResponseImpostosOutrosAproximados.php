<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseImpostosOutrosAproximados extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?bool $utilizarAliqIBPT
     * @param ?float $percentualAliq
     */
    public function __construct(
        public ?bool $utilizarAliqIBPT,
        public ?float $percentualAliq,
    ) {
    }
}
