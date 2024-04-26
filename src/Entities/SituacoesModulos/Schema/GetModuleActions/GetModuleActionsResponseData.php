<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleActions;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetModuleActionsResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param string $descricao
     */
    public function __construct(
        public int $id,
        public string $nome,
        public string $descricao,
    ) {
    }
}
