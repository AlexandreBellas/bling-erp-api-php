<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataTransporteVolumes extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $servico
     * @param ?string $codigoRastreamento
     */
    public function __construct(
        public int $id,
        public ?string $servico,
        public ?string $codigoRastreamento,
    ) {}
}
