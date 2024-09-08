<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da listagem de boletos vinculados a um idOrigem, o qual corresponde ao ID de uma venda ou nota fiscal.
 */
readonly final class GetBankSlipsResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?GetBankSlipsResponseVenda $venda
     * @param ?GetBankSlipsResponseNotaFiscal $notaFiscal
     * @param ?float $valorTotal
     * @param ?GetBankSlipsResponseContas[] $contas
     */
    public function __construct(
        public ?GetBankSlipsResponseVenda $venda,
        public ?GetBankSlipsResponseNotaFiscal $notaFiscal,
        public ?float $valorTotal,
        public ?array $contas
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'contas' => GetBankSlipsResponseContas::class,
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
