<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\TipoPagamento;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Padrao;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Destino;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\Finalidade;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $descricao
     * @param TipoPagamento $tipoPagamento
     * @param ?Situacao $situacao
     * @param ?bool $fixa
     * @param ?Padrao $padrao
     * @param ?string $condicao
     * @param Destino $destino
     * @param Finalidade $finalidade
     * @param ?FindResponseDataTaxas $taxas
     * @param ?FindResponseDataDadosCartao $dadosCartao
     */
    public function __construct(
        public ?int $id,
        public string $descricao,
        public TipoPagamento $tipoPagamento,
        public ?Situacao $situacao,
        public ?bool $fixa,
        public ?Padrao $padrao,
        public ?string $condicao,
        public Destino $destino,
        public Finalidade $finalidade,
        public ?FindResponseDataTaxas $taxas,
        public ?FindResponseDataDadosCartao $dadosCartao,
    ) {
    }
}
