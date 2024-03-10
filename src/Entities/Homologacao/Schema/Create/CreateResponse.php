<?php

namespace AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da criação do produto da homologação.
 */
readonly final class CreateResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param CreateResponseData $data
     * @param string $hash
     */
    public function __construct(
        public CreateResponseData $data,
        public string $hash
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

        return self::from([
            ...$response->body->content,
            'hash' => $response->headers->content['x-bling-homologacao'],
        ]);
    }
}
