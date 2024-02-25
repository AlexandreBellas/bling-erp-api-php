<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da listagem de boletos - Bling conta vinculados a um idOrigem.
 */
readonly final class GetBankSlipsResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $numberSale
     * @param ?string $numberNF
     * @param ?int $amountAccounts
     * @param ?float $amountValuesAccounts
     * @param ?bool $haveAccountWithIntegration
     * @param ?GetBankSlipsAccountsResponse $accounts
     */
    public function __construct(
        public ?string $numberSale,
        public ?string $numberNF,
        public ?int $amountAccounts,
        public ?float $amountValuesAccounts,
        public ?bool $haveAccountWithIntegration,
        public ?array $accounts
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'accounts' => GetBankSlipsAccountsResponse::class,
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
