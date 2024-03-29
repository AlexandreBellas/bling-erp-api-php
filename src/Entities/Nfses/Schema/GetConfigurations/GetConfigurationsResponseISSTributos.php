<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetConfigurationsResponseISSTributos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?float $percentualISS
     * @param string $CNAE
     * @param string $descricaoServico
     * @param ?bool $padrao
     * @param GetConfigurationsResponseISSTributosCodigo $codigo
     */
    public function __construct(
        public ?int $id,
        public ?float $percentualISS,
        public string $CNAE,
        public string $descricaoServico,
        public ?bool $padrao,
        public GetConfigurationsResponseISSTributosCodigo $codigo,
    ) {
    }
}
