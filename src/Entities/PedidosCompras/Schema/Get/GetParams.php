<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de pedidos de compras paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $situacao;
    public ?string $dataInicial;
    public ?string $dataFinal;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?int $idFornecedor
     * @param ?int $valorSituacao
     * @param ?int $idSituacao
     * @param \DateTimeInterface|string|null $dataInicial
     * @param \DateTimeInterface|string|null $dataFinal
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?int $idFornecedor = null,
        public ?int $valorSituacao = null,
        public ?int $idSituacao = null,
        \DateTimeInterface|string|null $dataInicial = null,
        \DateTimeInterface|string|null $dataFinal = null,
    ) {
        $this->dataInicial = $this->prepareStringOrDateParam($dataInicial);
        $this->dataFinal = $this->prepareStringOrDateParam($dataFinal);

        parent::__construct(objectToArray($this));
    }
}
