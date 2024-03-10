<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\TipoPagamento;

/**
 * Parâmetros da busca de formas de pagamentos paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?array $tiposPagamentos;
    public ?string $situacao;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?string $descricao
     * @param TipoPagamento[]|int[]|null $tiposPagamentos
     * @param Situacao|string|null $situacao
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?string $descricao = null,
        ?array $tiposPagamentos = null,
        Situacao|string|null $situacao = null,
    ) {
        $this->situacao = $situacao instanceof Situacao ? $situacao->value : $situacao;
        $this->tiposPagamentos = array_map(
            fn(TipoPagamento|int $tipoPagamento) => $tipoPagamento instanceof TipoPagamento
            ? $tipoPagamento->value
            : $tipoPagamento,
            ($tiposPagamentos ?? [])
        );

        parent::__construct(objectToArray($this));
    }
}
