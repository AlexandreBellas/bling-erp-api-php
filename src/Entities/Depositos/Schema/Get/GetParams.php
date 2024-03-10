<?php

namespace AleBatistella\BlingErpApi\Entities\Depositos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Depositos\Enum\Situacao;

/**
 * Parâmetros da busca de depósitos paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $situacao;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?string $descricao
     * @param Situacao|int|null $situacao
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?string $descricao = null,
        Situacao|int|null $situacao = null,
    ) {
        $this->situacao = $situacao instanceof Situacao ? $situacao->value : $situacao;

        parent::__construct(objectToArray($this));
    }
}
