<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?array $idsVinculosAgrupadores
     * @param ?array $idsOpcoes
     */
    public function __construct(
        public int $id,
        public ?array $idsVinculosAgrupadores,
        public ?array $idsOpcoes
    ) {
    }
}
