<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param array $categoriasProdutos
     */
    public function __construct(
        public int $id,
        public array $categoriasProdutos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "categoriasProdutos" => Id::class,
        ];
    }
}
