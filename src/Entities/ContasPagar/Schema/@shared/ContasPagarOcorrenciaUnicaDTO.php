<?php

namespace AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Exceptions\BlingParseResponsePayloadException;

readonly class ContasPagarOcorrenciaUnicaDTO extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     * 
     * @param int $tipo
     */
    public function __construct(
        public int $tipo
    ) {}

    /**
     * @inheritDoc
     */
    public static function from(array $attributes): static
    {
        if (!array_key_exists('tipo', $attributes) || $attributes['tipo'] !== 1) {
            throw new BlingParseResponsePayloadException($attributes);
        }

        return parent::from($attributes);
    }
}
