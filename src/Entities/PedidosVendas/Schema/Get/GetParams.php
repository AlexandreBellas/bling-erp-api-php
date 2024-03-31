<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\Situacao;

/**
 * Parâmetros da busca de pedidos de vendas paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?array $situacoes;
    public ?string $dataInicial;
    public ?string $dataFinal;
    public ?string $dataAlteracaoInicial;
    public ?string $dataAlteracaoFinal;
    public ?string $dataPrevistaInicial;
    public ?string $dataPrevistaFinal;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?int $idContato
     * @param Situacao[]|int[]|null $situacoes
     * @param \DateTimeInterface|string|null $dataInicial
     * @param \DateTimeInterface|string|null $dataFinal
     * @param \DateTimeInterface|string|null $dataAlteracaoInicial
     * @param \DateTimeInterface|string|null $dataAlteracaoFinal
     * @param \DateTimeInterface|string|null $dataPrevistaInicial
     * @param \DateTimeInterface|string|null $dataPrevistaFinal
     * @param ?int $numero
     * @param ?int $idLoja
     * @param ?int $idVendedor
     * @param ?int $idControleCaixa
     * @param ?string[] $numerosLojas
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?int $idContato = null,
        ?array $situacoes = null,
        \DateTimeInterface|string|null $dataInicial = null,
        \DateTimeInterface|string|null $dataFinal = null,
        \DateTimeInterface|string|null $dataAlteracaoInicial = null,
        \DateTimeInterface|string|null $dataAlteracaoFinal = null,
        \DateTimeInterface|string|null $dataPrevistaInicial = null,
        \DateTimeInterface|string|null $dataPrevistaFinal = null,
        public ?int $numero = null,
        public ?int $idLoja = null,
        public ?int $idVendedor = null,
        public ?int $idControleCaixa = null,
        public ?array $numerosLojas = null,
    ) {
        $this->situacoes = array_map(
            fn (Situacao|int|null $situacao) => $situacao instanceof Situacao
                ? $situacao->value
                : $situacao,
            $situacoes
        );

        $this->dataInicial = $this->prepareStringOrDateParam($dataInicial);
        $this->dataFinal = $this->prepareStringOrDateParam($dataFinal);
        $this->dataAlteracaoInicial = $this->prepareStringOrDateParam($dataAlteracaoInicial);
        $this->dataAlteracaoFinal = $this->prepareStringOrDateParam($dataAlteracaoFinal);
        $this->dataPrevistaInicial = $this->prepareStringOrDateParam($dataPrevistaInicial);
        $this->dataPrevistaFinal = $this->prepareStringOrDateParam($dataPrevistaFinal);

        parent::__construct(objectToArray($this));
    }
}
