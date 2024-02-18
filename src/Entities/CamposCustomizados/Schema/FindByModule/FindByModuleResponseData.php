<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\FindByModule;

use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindByModuleResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     * 
     * @param int $id
     * @param string $nome
     * @param ?Situacao $situacao
     */
    public function __construct(
        public int $id,
        public string $nome,
        public ?Situacao $situacao,
    ) {
    }
}
