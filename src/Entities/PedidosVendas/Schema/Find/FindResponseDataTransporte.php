<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\FretePorConta;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataTransporte extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\FretePorConta $fretePorConta
     * @param ?float $frete
     * @param ?int $quantidadeVolumes
     * @param ?float $pesoBruto
     * @param ?int $prazoEntrega
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataTransporteContato $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataTransporteEtiqueta $etiqueta
     * @param ?array $volumes
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
            "volumes" => FindResponseDataTransporteVolumes::class,
        ];
    }
}
