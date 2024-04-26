<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da busca de vendedores paginados.
 */
readonly final class GetResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GetResponseData $data
     */
    public function __construct(
        public GetResponseData $data
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
