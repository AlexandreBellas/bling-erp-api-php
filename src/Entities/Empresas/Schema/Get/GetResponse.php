<?php

namespace AleBatistella\BlingErpApi\Entities\Empresas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da obtenção do CNPJ, razão social e e-mail da empresa.
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
