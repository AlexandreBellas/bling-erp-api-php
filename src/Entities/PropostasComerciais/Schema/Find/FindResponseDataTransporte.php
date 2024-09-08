<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find;

use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Enum\FreteModalidade;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataTransporte extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?FreteModalidade $freteModalidade
     * @param ?float $frete
     * @param ?float $quantidadeVolumes
     * @param ?int $prazoEntrega
     * @param ?float $pesoBruto
     * @param ?FindResponseDataTransporteContato $contato
     * @param ?FindResponseDataTransporteVolumes $volumes
     */
    public function __construct(
        public ?FreteModalidade $freteModalidade,
        public ?float $frete,
        public ?float $quantidadeVolumes,
        public ?int $prazoEntrega,
        public ?float $pesoBruto,
        public ?FindResponseDataTransporteContato $contato,
        public ?FindResponseDataTransporteVolumes $volumes,
    ) {}
}
