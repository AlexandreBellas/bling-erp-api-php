<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetModules;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * CamposCustomizadosPermissaoDTO
 */
readonly final class GetModulesResponseDataPermissoes extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $nome
     * @param string $modulo
     * @param bool $autorizado
     */
    public function __construct(
        public string $nome,
        public string $modulo,
        public bool $autorizado,
    ) {
    }
}
