<?php

namespace AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Delete;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da remoção do produto da homologação pelo ID.
 */
readonly final class DeleteResponse extends BaseResponseRootObject
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
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions $response
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        if (!is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        $homologacao = "x-bling-homologacao";

        return new self(
            hash: $response->headers->content[$homologacao]
        );
    }
}
