<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseImpostosOutrosINSS extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?bool $reter
     */
    public function __construct(
        public ?bool $reter,
    ) {
    }
}
