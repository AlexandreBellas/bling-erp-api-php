<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da criação de uma nota de serviço.
 */
readonly final class CreateResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param CreateResponseData $data
     */
    public function __construct(
        public CreateResponseData $data
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
