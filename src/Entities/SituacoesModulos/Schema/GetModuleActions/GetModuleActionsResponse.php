<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleActions;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da obtenção das ações de um módulo pelo ID.
 */
readonly final class GetModuleActionsResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GetModuleActionsResponseData[] $data
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
            'data' => GetModuleActionsResponseData::class
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
