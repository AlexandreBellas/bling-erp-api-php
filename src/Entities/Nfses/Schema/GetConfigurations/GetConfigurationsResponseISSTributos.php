<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
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
     * @param \AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseISSTributosCodigo $codigo
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
