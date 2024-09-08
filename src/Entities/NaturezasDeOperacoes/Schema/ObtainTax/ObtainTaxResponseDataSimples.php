<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum\Tributacao;

readonly final class ObtainTaxResponseDataSimples extends BaseResponseObject
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
     * @param ?float $baseDiferimento
     * @param ?float $modalidadeBaseCalculo
     * @param ?float $valorPauta
     * @param ?float $valorImpostoSt
     * @param ?float $valorBaseCalculoSt
     * @param ?float $baseCalculoSt
     * @param ?float $percentualAdicionadoSt
     * @param ?float $modalidadeBaseCalculoSt
     * @param ?float $valorPautaSt
     * @param ?float $aliquotaSt
     * @param ?float $aliquotaStRetido
     * @param ?float $baseStRetido
     * @param ?float $valorUnitarioBaseCstRetencao
     * @param ?float $valorUnitarioIcmsStRetencao
     * @param ?float $valorUnitarioIcmsSubstituto
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
        public ?float $baseDiferimento,
        public ?float $modalidadeBaseCalculo,
        public ?float $valorPauta,
        public ?float $valorImpostoSt,
        public ?float $valorBaseCalculoSt,
        public ?float $baseCalculoSt,
        public ?float $percentualAdicionadoSt,
        public ?float $modalidadeBaseCalculoSt,
        public ?float $valorPautaSt,
        public ?float $aliquotaSt,
        public ?float $aliquotaStRetido,
        public ?float $baseStRetido,
        public ?float $valorUnitarioBaseCstRetencao,
        public ?float $valorUnitarioIcmsStRetencao,
        public ?float $valorUnitarioIcmsSubstituto,
    ) {}
}
