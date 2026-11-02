<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataFornecedor extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataFornecedorContato $contato
     * @param ?string $codigo
     * @param ?float $precoCusto
     * @param ?float $precoCompra
     */
    public function __construct(
        public ?int $id,
        public ?FindResponseDataFornecedorContato $contato,
        public ?string $codigo,
        public ?float $precoCusto,
        public ?float $precoCompra,
    ) {}
}
