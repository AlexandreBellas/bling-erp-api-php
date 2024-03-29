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
     * @param ?GetConfigurationsResponseBasicas $basicas
     * @param ?GetConfigurationsResponseISS $ISS
     * @param ?GetConfigurationsResponseControle $controle
     * @param ?GetConfigurationsResponseImpostos $impostos
     * @param ?GetConfigurationsResponseEnvioEmail $envioEmail
     * @param ?GetConfigurationsResponseAdicionais $adicionais
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
