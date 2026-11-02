<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class GetBalancesResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $produto
     * @param ?float $saldoFisicoTotal
     * @param ?float $saldoVirtualTotal
     * @param array $depositos
     */
    public function __construct(
        public ?Id $produto,
        public ?float $saldoFisicoTotal,
        public ?float $saldoVirtualTotal,
        public array $depositos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "depositos" => GetBalancesResponseDataDepositos::class,
        ];
    }
}
