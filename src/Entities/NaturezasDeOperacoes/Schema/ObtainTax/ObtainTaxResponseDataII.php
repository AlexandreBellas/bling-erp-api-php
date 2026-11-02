<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum\Tributacao;

/**
 * Dados da resposta.
 */
readonly final class ObtainTaxResponseDataII extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $regraOperacao
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum\Tributacao $tributacao
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
