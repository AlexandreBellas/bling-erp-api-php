<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GenerateOverDemandResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?GenerateOverDemandResponseDataItens[] $itens
     * @param GenerateOverDemandResponseDataDeposito $deposito
     */
    public function __construct(
        public ?int $id,
        public ?array $itens,
        public GenerateOverDemandResponseDataDeposito $deposito,
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "itens" => GenerateOverDemandResponseDataItens::class,
        ];
    }
}
