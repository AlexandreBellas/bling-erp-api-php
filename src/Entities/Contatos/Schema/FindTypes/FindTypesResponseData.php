<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindTypes;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindTypesResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     * 
     * @param int $id
     * @param ?string $descricao
     */
    public function __construct(
        public int $id,
        public ?string $descricao,
    ) {
    }
}
