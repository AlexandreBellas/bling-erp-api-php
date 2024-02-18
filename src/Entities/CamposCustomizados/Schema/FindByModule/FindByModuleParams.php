<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\FindByModule;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de campos customizados por módulo.
 */
readonly final class FindByModuleParams extends QueryParams
{
    /**
     * Constrói o objeto.
     * 
     * @param ?int $pagina
     * @param ?int $limite
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null
    ) {
        parent::__construct(objectToArray($this));
    }
}
