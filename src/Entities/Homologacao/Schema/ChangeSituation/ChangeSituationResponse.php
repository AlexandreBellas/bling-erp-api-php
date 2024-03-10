<?php

namespace AleBatistella\BlingErpApi\Entities\Homologacao\Schema\ChangeSituation;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da alteração da situação do produto da homologação pelo ID.
 */
readonly final class ChangeSituationResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $hash
     */
    public function __construct(
        public string $hash
    ) {
    }

    /**
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        if (!is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        return new static(
            hash: $response->headers->content['x-bling-homologacao']
        );
    }
}
