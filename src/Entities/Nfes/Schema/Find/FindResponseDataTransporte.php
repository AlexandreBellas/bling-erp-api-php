<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\FretePorConta;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataTransporte extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfes\Enum\FretePorConta $fretePorConta
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find\FindResponseDataTransporteTransportador $transportador
     * @param ?array $volumes
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find\FindResponseDataTransporteEtiqueta $etiqueta
     */
    public function __construct(
        public ?FretePorConta $fretePorConta,
        public ?FindResponseDataTransporteTransportador $transportador,
        public ?array $volumes,
        public ?FindResponseDataTransporteEtiqueta $etiqueta,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "volumes" => Id::class
        ];
    }
}
