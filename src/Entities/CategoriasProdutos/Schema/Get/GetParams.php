<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Get;

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
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
