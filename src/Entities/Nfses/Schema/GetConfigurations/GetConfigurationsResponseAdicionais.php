<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetConfigurationsResponseAdicionais extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $CFPS
     * @param ?string $CFOP
     * @param ?string $AEDF
     * @param ?int $proximoNumeroLote
     * @param ?string $observacaoImpressaNota
     * @param ?string $descricaoComplementar
     * @param ?string $tipoEmissao
     * @param ?bool $campoNumeroDocContas
     * @param ?bool $incentivadorFiscal
     * @param ?bool $alterarSituacao
     * @param ?bool $incluirParcelas
     * @param ?bool $considerarDataParcela
     * @param ?bool $considerarDataOrdemServico
     * @param ?GetConfigurationsResponseAdicionaisCadastroPrefeitura $cadastroPrefeitura
     */
    public function __construct(
        public ?string $CFPS,
        public ?string $CFOP,
        public ?string $AEDF,
        public ?int $proximoNumeroLote,
        public ?string $observacaoImpressaNota,
        public ?string $descricaoComplementar,
        public ?string $tipoEmissao,
        public ?bool $campoNumeroDocContas,
        public ?bool $incentivadorFiscal,
        public ?bool $alterarSituacao,
        public ?bool $incluirParcelas,
        public ?bool $considerarDataParcela,
        public ?bool $considerarDataOrdemServico,
        public ?GetConfigurationsResponseAdicionaisCadastroPrefeitura $cadastroPrefeitura,
    ) {
    }
}
