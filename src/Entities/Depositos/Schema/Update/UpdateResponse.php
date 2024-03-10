<?php

namespace AleBatistella\BlingErpApi\Entities\Depositos\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\ErrorField;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da alteração de um depósito pelo ID.
 */
readonly final class UpdateResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?ErrorField[] $alertas
     */
    public function __construct(
        public int $id,
        public ?array $alertas,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'alertas' => ErrorField::class,
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
