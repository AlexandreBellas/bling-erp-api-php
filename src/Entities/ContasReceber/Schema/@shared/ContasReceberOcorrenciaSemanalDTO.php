<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Shared;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Exceptions\BlingParseResponsePayloadException;

readonly class ContasReceberOcorrenciaSemanalDTO extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     * 
     * @param int $tipo
     * @param ?bool $considerarDiasUteis
     * @param int $diaSemanaVencimento
     * @param ?string $dataLimite
     */
    public function __construct(
        public int $tipo,
        public ?bool $considerarDiasUteis,
        public int $diaSemanaVencimento,
        public ?string $dataLimite
    ) {
    }

    /**
     * @inheritDoc
     */
    public static function from(array $attributes): static
    {
        if (!array_key_exists('tipo', $attributes) || $attributes['tipo'] !== 9) {
            throw new BlingParseResponsePayloadException($attributes);
        }

        return parent::from($attributes);
    }
}