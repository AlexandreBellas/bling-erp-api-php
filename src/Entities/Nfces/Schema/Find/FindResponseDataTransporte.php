<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfces\Enum\FretePorConta;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataTransporte extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfces\Enum\FretePorConta $fretePorConta
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfces\Schema\Find\FindResponseDataTransporteTransportador $transportador
     * @param ?array $volumes
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfces\Schema\Find\FindResponseDataTransporteEtiqueta $etiqueta
     */
    public function __construct(
        public ?FretePorConta $fretePorConta,
        public ?FindResponseDataTransporteTransportador $transportador,
        public ?array $volumes,
        public ?FindResponseDataTransporteEtiqueta $etiqueta,
    ) {}

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
