<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum\Tributacao;

readonly final class ObtainTaxResponseDataCofinsSt extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?Id $regraOperacao
     * @param ?Tributacao $tributacao
     * @param ?string $cst
     * @param ?float $aliquota
     * @param ?float $base
     * @param ?float $valorBaseCalculo
     * @param ?float $valorImposto
     * @param ?string $observacoes
     * @param ?string $informacoesAdicionaisFisco
     */
    public function __construct(
        public ?Id $regraOperacao,
        public ?Tributacao $tributacao,
        public ?string $cst,
        public ?float $aliquota,
        public ?float $base,
        public ?float $valorBaseCalculo,
        public ?float $valorImposto,
        public ?string $observacoes,
        public ?string $informacoesAdicionaisFisco,
    ) {}
}
