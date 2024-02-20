<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Enum\Situacao;

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
     * @param ?Tipo $tipo
     * @param ?Situacao $situacao
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?Tipo $tipo = null,
        public ?Situacao $situacao = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
