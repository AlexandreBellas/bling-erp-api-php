<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetResponseDataGrupoProdutoPai extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $nome
     */
    public function __construct(
        public int $id,
        public ?string $nome,
    ) {}
}
