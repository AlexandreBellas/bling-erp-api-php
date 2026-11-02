<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da listagem de todas as configurações de nota de serviço.
 */
readonly final class GetConfigurationsResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseBasicas $basicas
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseISS $ISS
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseControle $controle
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseImpostos $impostos
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseEnvioEmail $envioEmail
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseAdicionais $adicionais
     */
    public function __construct(
        public ?GetConfigurationsResponseBasicas $basicas,
        public ?GetConfigurationsResponseISS $ISS,
        public ?GetConfigurationsResponseControle $controle,
        public ?GetConfigurationsResponseImpostos $impostos,
        public ?GetConfigurationsResponseEnvioEmail $envioEmail,
        public ?GetConfigurationsResponseAdicionais $adicionais,
    ) {
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions $response
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        if (is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        return self::from($response->body->content);
    }
}
