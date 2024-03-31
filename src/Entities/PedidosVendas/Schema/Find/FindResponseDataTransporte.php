<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\FretePorConta;

readonly final class FindResponseDataTransporte extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?FretePorConta $fretePorConta
     * @param ?float $frete
     * @param ?int $quantidadeVolumes
     * @param ?float $pesoBruto
     * @param ?int $prazoEntrega
     * @param ?FindResponseDataTransporteContato $contato
     * @param ?FindResponseDataTransporteEtiqueta $etiqueta
     * @param ?FindResponseDataTransporteVolumes[] $volumes
     */
    public function __construct(
        public ?FretePorConta $fretePorConta,
        public ?float $frete,
        public ?int $quantidadeVolumes,
        public ?float $pesoBruto,
        public ?int $prazoEntrega,
        public ?FindResponseDataTransporteContato $contato,
        public ?FindResponseDataTransporteEtiqueta $etiqueta,
        public ?array $volumes,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'volumes' => FindResponseDataTransporteVolumes::class,
        ];
    }
}
