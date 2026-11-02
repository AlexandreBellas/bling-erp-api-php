<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleTransitions;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da obtenção das transições de um módulo pelo ID.
 */
readonly final class GetModuleTransitionsResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param array $data
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
            "data" => GetModuleTransitionsResponseData::class
        ];
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
