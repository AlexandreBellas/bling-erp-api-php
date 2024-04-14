<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?Id[] $categoriasProdutos
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
            'categoriasProdutos' => Id::class,
        ];
    }
}
