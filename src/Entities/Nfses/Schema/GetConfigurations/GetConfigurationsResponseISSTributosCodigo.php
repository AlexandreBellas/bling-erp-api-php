<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetConfigurationsResponseISSTributosCodigo extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $listaServico
     * @param ?string $tributacao
     */
    public function __construct(
        public string $listaServico,
        public ?string $tributacao,
    ) {
    }
}
