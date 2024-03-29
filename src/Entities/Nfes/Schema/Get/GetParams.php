<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Tipo;

/**
 * Parâmetros da busca de notas fiscais paginadas.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $situacao;
    public ?int $tipo;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?string $numeroLoja
     * @param Situacao|int|null $situacao
     * @param Tipo|int|null $tipo
     * @param ?string $dataEmissaoInicial
     * @param ?string $dataEmissaoFinal
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?string $numeroLoja = null,
        Situacao|string|null $situacao = null,
        Tipo|string|null $tipo = null,
        public ?string $dataEmissaoInicial = null,
        public ?string $dataEmissaoFinal = null,
    ) {
        $this->situacao = $situacao instanceof Situacao ? $situacao->value : $situacao;
        $this->tipo = $tipo instanceof Tipo ? $tipo->value : $tipo;

        parent::__construct(objectToArray($this));
    }
}
