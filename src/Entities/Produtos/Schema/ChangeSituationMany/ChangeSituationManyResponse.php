<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\ChangeSituationMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da alteração de situação de múltiplos produtos pelos IDs.
 */
readonly final class ChangeSituationManyResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?ChangeSituationManyResponseData $data
     */
    public function __construct(
        public ?ChangeSituationManyResponseData $data
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
