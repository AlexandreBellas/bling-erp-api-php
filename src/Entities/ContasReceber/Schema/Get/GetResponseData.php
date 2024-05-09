<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\Situacao;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param Situacao $situacao
     * @param string $vencimento
     * @param float $valor
     * @param ?string $idTransacao
     * @param ?string $linkQRCodePix
     * @param ?string $linkBoleto
     * @param ?string $dataEmissao
     * @param GetResponseDataContato $contato
     * @param ?GetResponseDataFormaPagamento $formaPagamento
     * @param ?GetResponseDataContaContabil $contaContabil
     * @param ?GetResponseDataOrigem $origem
     */
    public function __construct(
        public ?int $id,
        public Situacao $situacao,
        public string $vencimento,
        public float $valor,
        public ?string $idTransacao,
        public ?string $linkQRCodePix,
        public ?string $linkBoleto,
        public ?string $dataEmissao,
        public GetResponseDataContato $contato,
        public ?GetResponseDataFormaPagamento $formaPagamento,
        public ?GetResponseDataContaContabil $contaContabil,
        public ?GetResponseDataOrigem $origem,
    ) {
    }
}
