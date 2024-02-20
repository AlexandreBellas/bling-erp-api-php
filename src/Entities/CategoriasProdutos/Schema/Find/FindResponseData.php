<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
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
