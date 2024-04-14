<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de produtos fornecedores paginados.
 */
readonly final class GetParams extends QueryParams
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?int $idProduto
     * @param ?int $idFornecedor
     */
    public function __construct(
        public ?int $pagina,
        public ?int $limite,
        public ?int $idProduto,
        public ?int $idFornecedor,
    ) {
        parent::__construct(objectToArray($this));
    }
}
