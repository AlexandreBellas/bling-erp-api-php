<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModules;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetModulesResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param string $descricao
     * @param bool $criarSituacoes
     */
    public function __construct(
        public int $id,
        public string $nome,
        public string $descricao,
        public bool $criarSituacoes,
    ) {
    }
}
