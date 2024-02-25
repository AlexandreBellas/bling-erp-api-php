<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Shared;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Exceptions\BlingParseResponsePayloadException;

readonly class ContasReceberOcorrenciaParceladaDTO extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     * 
     * @param int $tipo
     * @param ?bool $considerarDiasUteis
     * @param int $diaVencimento
     * @param ?int $numeroParcelas
     */
    public function __construct(
        public int $tipo,
        public ?bool $considerarDiasUteis,
        public int $diaVencimento,
        public ?int $numeroParcelas
    ) {
    }

    /**
     * @inheritDoc
     */
    public static function from(array $attributes): static
    {
        if (!array_key_exists('tipo', $attributes) || $attributes['tipo'] !== 2) {
            throw new BlingParseResponsePayloadException($attributes);
        }

        return parent::from($attributes);
    }
}