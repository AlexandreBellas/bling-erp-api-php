<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleTransitions;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetModuleTransitionsResponseDataSituacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     */
    public function __construct(
        public int $id,
        public string $nome,
    ) {
    }
}
