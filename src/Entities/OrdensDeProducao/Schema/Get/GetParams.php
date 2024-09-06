<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de ordens de produção paginadas..
 */
readonly final class GetParams extends QueryParams
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?int[] $idsSituacoes
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?array $idsSituacoes = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
