<?php

namespace AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da obtenção do produto que será utilizado durante os demais passos
 * da homologação.
 */
readonly final class GetResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Get\GetResponseData $data
     * @param string $hash
     */
    public function __construct(
        public GetResponseData $data,
        public string $hash
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

        $homologacao = "x-bling-homologacao";

        return self::from([
            ...$response->body->content,
            "hash" => $response->headers->content[$homologacao],
        ]);
    }
}
