<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da geração de ordens de produção sob demanda (abaixo do estoque mínimo).
 */
readonly final class GenerateOverDemandResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GenerateOverDemandResponseData[] $data
     */
    public function __construct(
        public array $data
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'data' => GenerateOverDemandResponseData::class
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
