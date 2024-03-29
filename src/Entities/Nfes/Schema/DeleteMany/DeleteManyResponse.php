<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da remoção de múltiplas notas fiscais por IDs.
 */
readonly final class DeleteManyResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param DeleteManyResponseData $data
     */
    public function __construct(
        public DeleteManyResponseData $data
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
