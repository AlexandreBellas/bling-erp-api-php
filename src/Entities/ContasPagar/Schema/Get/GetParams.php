<?php

namespace AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Enum\Situacao;

/**
 * Parâmetros da busca de contas a pagar paginadas.
 */
readonly final class GetParams extends QueryParams
{
    public string|null $dataEmissaoInicial;
    public string|null $dataEmissaoFinal;
    public string|null $dataVencimentoInicial;
    public string|null $dataVencimentoFinal;
    public string|null $dataPagamentoInicial;
    public string|null $dataPagamentoFinal;

    /**
     * Constrói o objeto.
     * 
     * @param ?int $pagina N° da página da listagem
     * @param ?int $limite Quantidade de registros que devem ser exibidos por página
     * @param \DateTimeInterface|string|null $dataEmissaoInicial Data de emissão inicial da conta a pagar
     * @param \DateTimeInterface|string|null $dataEmissaoFinal Data de emissão final da conta a pagar
     * @param \DateTimeInterface|string|null $dataVencimentoInicial Data de vencimento inicial da conta a pagar
     * @param \DateTimeInterface|string|null $dataVencimentoFinal Data de vencimento final da conta a pagar
     * @param \DateTimeInterface|string|null $dataPagamentoInicial Data de pagamento inicial da conta
     * @param \DateTimeInterface|string|null $dataPagamentoFinal Data de pagamento final da conta
     * @param ?Situacao $situacao
     * @param ?int $idContato ID do contato
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        \DateTimeInterface|string|null $dataEmissaoInicial = null,
        \DateTimeInterface|string|null $dataEmissaoFinal = null,
        \DateTimeInterface|string|null $dataVencimentoInicial = null,
        \DateTimeInterface|string|null $dataVencimentoFinal = null,
        \DateTimeInterface|string|null $dataPagamentoInicial = null,
        \DateTimeInterface|string|null $dataPagamentoFinal = null,
        public ?Situacao $situacao = null,
        public ?int $idContato = null
    ) {
        $this->dataEmissaoInicial = $this->prepareStringOrDateParam($dataEmissaoInicial);
        $this->dataEmissaoFinal = $this->prepareStringOrDateParam($dataEmissaoFinal);
        $this->dataVencimentoInicial = $this->prepareStringOrDateParam($dataVencimentoInicial);
        $this->dataVencimentoFinal = $this->prepareStringOrDateParam($dataVencimentoFinal);
        $this->dataPagamentoInicial = $this->prepareStringOrDateParam($dataPagamentoInicial);
        $this->dataPagamentoFinal = $this->prepareStringOrDateParam($dataPagamentoFinal);

        parent::__construct(objectToArray($this));
    }
}
