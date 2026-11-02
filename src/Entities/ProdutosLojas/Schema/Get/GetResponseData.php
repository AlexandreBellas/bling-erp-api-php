<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?array $categoriasProdutos
     */
    public function __construct(
        public ?array $categoriasProdutos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "categoriasProdutos" => Id::class
        ];
    }
}
