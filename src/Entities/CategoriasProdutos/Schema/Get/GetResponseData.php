<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $descricao
     * @param ?Id $categoriaPai
     */
    public function __construct(
        public int $id,
        public string $descricao,
        public ?Id $categoriaPai,
    ) {
    }
}
