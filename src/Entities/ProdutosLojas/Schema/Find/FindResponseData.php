<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $codigo
     * @param ?float $preco
     * @param ?float $precoPromocional
     * @param Id $produto
     * @param Id $loja
     * @param ?Id $fornecedorLoja
     * @param ?Id $marcaLoja
     * @param ?Id[] $categoriasProdutos
     */
    public function __construct(
        public ?int $id,
        public string $codigo,
        public ?float $preco,
        public ?float $precoPromocional,
        public Id $produto,
        public Id $loja,
        public ?Id $fornecedorLoja,
        public ?Id $marcaLoja,
        public ?array $categoriasProdutos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'categoriasProdutos' => Id::class
        ];
    }
}
