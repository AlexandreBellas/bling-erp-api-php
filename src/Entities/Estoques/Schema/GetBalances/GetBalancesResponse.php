<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da obtenção do saldo em estoque de produtos, em todos os depósitos.
 */
readonly final class GetBalancesResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GetBalancesResponseData[] $data
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
            'data' => GetBalancesResponseData::class,
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
