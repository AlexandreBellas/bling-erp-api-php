<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Download;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Resposta do recebimento de uma conta a receber.
 */
readonly final class DownloadResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param Id $bordero
     */
    public function __construct(
        public Id $bordero
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
