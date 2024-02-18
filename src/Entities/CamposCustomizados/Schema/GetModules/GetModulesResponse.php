<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetModules;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da busca de módulos de campos customizados.
 */
readonly final class GetModulesResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GetModulesResponseData[] $data
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
            'data' => GetModulesResponseData::class,
        ];
    }
}
