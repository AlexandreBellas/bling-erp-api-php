<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class DeleteManyResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param array $alertas
     * @param array $idsExcluidos
     */
    public function __construct(
        public array $alertas,
        public array $idsExcluidos,
    ) {
    }
}
