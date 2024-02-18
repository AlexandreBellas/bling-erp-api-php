<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetModules;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetModulesResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param string $modulo
     * @param ?string $agrupador
     * @param GetModulesResponseDataPermissoes[] $permissoes
     */
    public function __construct(
        public int $id,
        public string $nome,
        public string $modulo,
        public ?string $agrupador,
        public array $permissoes
    ) {
    }
}
