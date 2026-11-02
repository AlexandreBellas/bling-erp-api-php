<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class ObtainTaxResponseData extends BaseResponseObject
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
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataIcms $icms
     * @param ?float $valorPmc
     * @param ?float $aliquotaValorAproxImpostos
     * @param ?string $informacoesAdicionaisFisco
     * @param ?bool $incluirFreteIpi
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataSimples $simples
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataIpi $ipi
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataIssqn $issqn
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataPis $pis
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataCofins $cofins
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataIcmsSt $icmsSt
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataPisSt $pisSt
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataCofinsSt $cofinsSt
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataII $ii
     * @param ?string $codigoBeneficioFiscal
     * @param ?float $porcentagemFcp
     * @param ?int $cfop
     * @param ?\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponseDataSimplesSt $simplesSt
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
        public ?ObtainTaxResponseDataIcms $icms,
        public ?float $valorPmc,
        public ?float $aliquotaValorAproxImpostos,
        public ?string $informacoesAdicionaisFisco,
        public ?bool $incluirFreteIpi,
        public ?ObtainTaxResponseDataSimples $simples,
        public ?ObtainTaxResponseDataIpi $ipi,
        public ?ObtainTaxResponseDataIssqn $issqn,
        public ?ObtainTaxResponseDataPis $pis,
        public ?ObtainTaxResponseDataCofins $cofins,
        public ?ObtainTaxResponseDataIcmsSt $icmsSt,
        public ?ObtainTaxResponseDataPisSt $pisSt,
        public ?ObtainTaxResponseDataCofinsSt $cofinsSt,
        public ?ObtainTaxResponseDataII $ii,
        public ?string $codigoBeneficioFiscal,
        public ?float $porcentagemFcp,
        public ?int $cfop,
        public ?ObtainTaxResponseDataSimplesSt $simplesSt,
    ) {}
}
