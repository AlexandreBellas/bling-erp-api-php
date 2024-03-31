<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Read;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta ao marcar a notificação relacionada à empresa como lida.
 */
readonly final class ReadResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ReadResponseData[] $data
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
            'data' => ReadResponseData::class,
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
