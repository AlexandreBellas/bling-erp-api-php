<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?int[] $idsVinculosAgrupadores
     * @param ?int[] $idsOpcoes
     */
    public function __construct(
        public int $id,
        public ?array $idsVinculosAgrupadores,
        public ?array $idsOpcoes
    ) {
    }
}
