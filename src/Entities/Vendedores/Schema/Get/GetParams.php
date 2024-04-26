<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Vendedores\Enum\SituacaoFiltro;

/**
 * Parâmetros da busca de vendedores paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?string $situacao;
    public ?string $dataAlteracaoInicial;
    public ?string $dataAlteracaoFinal;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?string $nomeContato
     * @param ?SituacaoFiltro $situacao
     * @param ?int $idContato
     * @param ?int $idLoja
     * @param \DateTimeInterface|string|null $dataAlteracaoInicial
     * @param \DateTimeInterface|string|null $dataAlteracaoFinal
     */
    public function __construct(
        public ?int $pagina,
        public ?int $limite,
        public ?string $nomeContato,
        ?SituacaoFiltro $situacao,
        public ?int $idContato,
        public ?int $idLoja,
        \DateTimeInterface|string|null $dataAlteracaoInicial,
        \DateTimeInterface|string|null $dataAlteracaoFinal,
    ) {
        $this->situacao = $situacao instanceof SituacaoFiltro ? $situacao->value : $situacao;

        $this->dataAlteracaoInicial = $this->prepareStringOrDateParam($dataAlteracaoInicial);
        $this->dataAlteracaoFinal = $this->prepareStringOrDateParam($dataAlteracaoFinal);

        parent::__construct(objectToArray($this));
    }
}
