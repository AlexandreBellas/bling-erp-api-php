<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\TipoFiltroData;

/**
 * Parâmetros da busca de contas a receber paginadas.
 */
readonly final class GetParams extends QueryParams
{
    public ?array $situacoes;
    public ?string $tipoFiltroData;
    public ?string $dataInicial;
    public ?string $dataFinal;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param Situacao[]|int[]|null $situacoes
     * @param TipoFiltroData|string|null $tipoFiltroData
     * @param \DateTimeInterface|string|null $dataInicial
     * @param \DateTimeInterface|string|null $dataFinal
     * @param ?int[] $idsCategorias
     * @param ?int $idPortador
     * @param ?int $idContato
     * @param ?int $idVendedor
     * @param ?int $idFormaPagamento
     * @param ?int $boletoGerado
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        ?array $situacoes = null,
        TipoFiltroData|string|null $tipoFiltroData = null,
        \DateTimeInterface|string|null $dataInicial = null,
        \DateTimeInterface|string|null $dataFinal = null,
        public ?array $idsCategorias = null,
        public ?int $idPortador = null,
        public ?int $idContato = null,
        public ?int $idVendedor = null,
        public ?int $idFormaPagamento = null,
        public ?int $boletoGerado = null
    ) {
        $this->situacoes = array_map(
            fn(Situacao|int|null $situacao) => $situacao instanceof Situacao ? $situacao->value : $situacao,
            $situacoes
        );
        $this->tipoFiltroData = $tipoFiltroData instanceof TipoFiltroData ? $tipoFiltroData->value : $tipoFiltroData;

        $this->dataInicial = $this->prepareStringOrDateParam($dataInicial);
        $this->dataFinal = $this->prepareStringOrDateParam($dataFinal);

        parent::__construct(objectToArray($this));
    }
}
