<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasLojas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de categorias de lojas virtuais vinculadas a de produtos.
 */
readonly final class GetParams extends QueryParams
{
    /**
     * Constrói o objeto.
     * 
     * @param ?int $pagina N° da página da listagem
     * @param ?int $limite Quantidade de registros que devem ser exibidos por página
     * @param ?int $idLoja ID da loja
     * @param ?int $idCategoriaProduto ID da categoria do produto
     * @param ?int $idCategoriaProdutoPai ID da categoria do produto pai
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?int $idLoja = null,
        public ?int $idCategoriaProduto = null,
        public ?int $idCategoriaProdutoPai = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
