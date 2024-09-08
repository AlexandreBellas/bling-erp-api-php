<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\OptionalId;

readonly final class FindResponseDataParcelas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $numeroDias
     * @param ?string $dataVencimento
     * @param ?float $valor
     * @param ?string $observacoes
     * @param ?array $formaPagamento
     */
    public function __construct(
        public ?int $numeroDias,
        public ?string $dataVencimento,
        public ?float $valor,
        public ?string $observacoes,
        public ?array $formaPagamento,
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'formaPagamento' => OptionalId::class
        ];
    }
}
