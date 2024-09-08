<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Resposta da criação de uma proposta comercial.
 */
readonly final class CreateResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param Id $data
     */
    public function __construct(
        public Id $data
    ) {}

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
