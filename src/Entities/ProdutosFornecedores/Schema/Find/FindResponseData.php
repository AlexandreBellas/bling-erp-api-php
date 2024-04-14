<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $descricao
     * @param ?string $codigo
     * @param ?float $precoCusto
     * @param ?float $precoCompra
     * @param ?bool $padrao
     * @param Id $produto
     * @param Id $fornecedor
     * @param ?int $garantia
     */
    public function __construct(
        public ?int $id,
        public ?string $descricao,
        public ?string $codigo,
        public ?float $precoCusto,
        public ?float $precoCompra,
        public ?bool $padrao,
        public ?Id $produto,
        public ?Id $fornecedor,
        public ?int $garantia,
    ) {
    }
}
