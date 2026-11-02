<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Finalidade;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\TipoPagamento;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Padrao;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $descricao
     * @param \AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\TipoPagamento $tipoPagamento
     * @param ?\AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Situacao $situacao
     * @param ?bool $fixa
     * @param ?\AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Padrao $padrao
     * @param \AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Finalidade $finalidade
     */
    public function __construct(
        public ?int $id,
        public string $descricao,
        public TipoPagamento $tipoPagamento,
        public ?Situacao $situacao,
        public ?bool $fixa,
        public ?Padrao $padrao,
        public Finalidade $finalidade
    ) {}
}
