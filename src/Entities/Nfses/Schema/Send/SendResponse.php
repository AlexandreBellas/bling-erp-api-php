<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\Send;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta do envio de uma nota de serviço pelo ID..
 */
readonly final class SendResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?SendResponseData $data
     */
    public function __construct(
        public ?SendResponseData $data
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
