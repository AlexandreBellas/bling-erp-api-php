<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class GetBalancesResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?Id $produto
     * @param ?float $saldoFisicoTotal
     * @param ?float $saldoVirtualTotal
     * @param ?GetBalancesResponseDataDepositos[] $depositos
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
            'depositos' => GetBalancesResponseDataDepositos::class,
        ];
    }
}
