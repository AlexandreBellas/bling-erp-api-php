<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\FindByModule;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da busca de campos customizados por módulo.
 */
readonly final class FindByModuleResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param FindByModuleResponseData[] $data
     */
    public function __construct(
        public array $data
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

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'data' => FindByModuleResponseData::class,
        ];
    }
}
