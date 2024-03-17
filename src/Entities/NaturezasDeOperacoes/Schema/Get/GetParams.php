<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum\Situacao;

/**
 * Parâmetros da obtenção de naturezas de operação paginadas.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $situacao;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param Situacao|int|null $situacao
     * @param string $descricao
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        Situacao|int|null $situacao = null,
        public ?string $descricao = null,
    ) {
        $this->situacao = $situacao instanceof Situacao
            ? $situacao->value
            : $situacao;

        parent::__construct(objectToArray($this));
    }
}
