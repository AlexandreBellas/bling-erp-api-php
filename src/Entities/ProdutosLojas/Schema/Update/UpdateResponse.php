<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da alteração do vínculo de um produto com uma loja pelo ID.
 */
readonly final class UpdateResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param UpdateResponseData $data
     */
    public function __construct(
        public UpdateResponseData $data
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
