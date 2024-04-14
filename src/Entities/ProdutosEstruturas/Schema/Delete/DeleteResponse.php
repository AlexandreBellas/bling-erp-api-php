<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Delete;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da remoção da estrutura de múltiplos produtos com composição pelos
 * IDs.
 */
readonly final class DeleteResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?DeleteResponseData $data
     */
    public function __construct(
        public ?DeleteResponseData $data
    ) {
    }

    /**
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        if (is_null($response->body?->content)) {
            return new self(null);
        }

        return self::from($response->body->content);
    }
}
