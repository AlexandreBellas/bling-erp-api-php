<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da busca de um servico de logística pelo ID.
 */
readonly final class FindResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Find\FindResponseData $data
     */
    public function __construct(
        public FindResponseData $data
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
