<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class DeleteManyParams extends QueryParams
{
    /**
     * @param array $idsGruposProdutos
     */
    public function __construct(
        public array $idsGruposProdutos,
    ) {
        parent::__construct(objectToArray($this));
    }
}
