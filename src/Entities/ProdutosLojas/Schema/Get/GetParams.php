<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de produtos com lojas paginados.
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
     * @param ?int $idLoja
     * @param ?int $idCategoriaProduto
     */
    public function __construct(
        public ?int $pagina,
        public ?int $limite,
        public ?int $idProduto,
        public ?int $idFornecedor,
        public ?int $idLoja,
        public ?int $idCategoriaProduto,
    ) {
        parent::__construct(objectToArray($this));
    }
}
