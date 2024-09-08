<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de grupos de produtos paginados.
 */
readonly final class GetParams extends QueryParams
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $nome
     * @param ?string $nomePai
     * @param ?int $pagina
     * @param ?int $limite
     */
    public function __construct(
        public ?string $nome = null,
        public ?string $nomePai = null,
        public ?int $pagina = null,
        public ?int $limite = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
