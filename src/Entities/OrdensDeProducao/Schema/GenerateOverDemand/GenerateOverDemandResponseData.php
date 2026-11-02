<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GenerateOverDemandResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?array $itens
     * @param \AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand\GenerateOverDemandResponseDataDeposito $deposito
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
