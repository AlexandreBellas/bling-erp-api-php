<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\GetByLogistic;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da listagem de remessas de postagem de uma logística pelo ID.
 */
readonly final class GetByLogisticResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GetByLogisticResponseData[] $data
     */
    public function __construct(
        public array $data
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'data' => GetByLogisticResponseData::class,
        ];
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
