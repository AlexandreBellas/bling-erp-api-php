<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\CalculateItemTax;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class CalculateItemTaxResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?bool $faturada
     * @param ?string $observacoes
     * @param ?bool $pisCofinsPresumido
     * @param ?bool $somaImpostosTotal
     * @param ?bool $somaIcmsTotal
     * @param ?float $aliquotaFunrural
     * @param ?bool $descontaFunrural
     * @param ?bool $consumidorFinal
     * @param ?bool $retImpostoRetido
     * @param ?float $retAliquotaIr
     * @param ?float $retValorIr
     * @param ?float $retAliquotaCsll
     * @param ?float $retValorCsll
     * @param ?bool $descontoCondicional
     * @param ?float $baseComissao
     * @param ?CalculateItemTaxResponseDataIcms $icms
     * @param ?float $valorPmc
     * @param ?float $aliquotaValorAproxImpostos
     * @param ?string $informacoesAdicionaisFisco
     * @param ?bool $incluirFreteIpi
     * @param ?CalculateItemTaxResponseDataSimples $simples
     * @param ?CalculateItemTaxResponseDataIpi $ipi
     * @param ?CalculateItemTaxResponseDataIssqn $issqn
     * @param ?CalculateItemTaxResponseDataPis $pis
     * @param ?CalculateItemTaxResponseDataCofins $cofins
     * @param ?CalculateItemTaxResponseDataIcmsSt $icmsSt
     * @param ?CalculateItemTaxResponseDataPisSt $pisSt
     * @param ?CalculateItemTaxResponseDataCofinsSt $cofinsSt
     * @param ?CalculateItemTaxResponseDataII $ii
     * @param ?string $codigoBeneficioFiscal
     * @param ?float $porcentagemFcp
     * @param ?int $cfop
     * @param ?CalculateItemTaxResponseDataSimplesSt $simplesSt
     */
    public function __construct(
        public ?bool $faturada,
        public ?string $observacoes,
        public ?bool $pisCofinsPresumido,
        public ?bool $somaImpostosTotal,
        public ?bool $somaIcmsTotal,
        public ?float $aliquotaFunrural,
        public ?bool $descontaFunrural,
        public ?bool $consumidorFinal,
        public ?bool $retImpostoRetido,
        public ?float $retAliquotaIr,
        public ?float $retValorIr,
        public ?float $retAliquotaCsll,
        public ?float $retValorCsll,
        public ?bool $descontoCondicional,
        public ?float $baseComissao,
        public ?CalculateItemTaxResponseDataIcms $icms,
        public ?float $valorPmc,
        public ?float $aliquotaValorAproxImpostos,
        public ?string $informacoesAdicionaisFisco,
        public ?bool $incluirFreteIpi,
        public ?CalculateItemTaxResponseDataSimples $simples,
        public ?CalculateItemTaxResponseDataIpi $ipi,
        public ?CalculateItemTaxResponseDataIssqn $issqn,
        public ?CalculateItemTaxResponseDataPis $pis,
        public ?CalculateItemTaxResponseDataCofins $cofins,
        public ?CalculateItemTaxResponseDataIcmsSt $icmsSt,
        public ?CalculateItemTaxResponseDataPisSt $pisSt,
        public ?CalculateItemTaxResponseDataCofinsSt $cofinsSt,
        public ?CalculateItemTaxResponseDataII $ii,
        public ?string $codigoBeneficioFiscal,
        public ?float $porcentagemFcp,
        public ?int $cfop,
        public ?CalculateItemTaxResponseDataSimplesSt $simplesSt,
    ) {
    }
}
