<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\TipoArmamento;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseDataTributacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $origem
     * @param ?string $nFCI
     * @param ?string $ncm
     * @param ?string $cest
     * @param ?string $codigoListaServicos
     * @param ?string $spedTipoItem
     * @param ?string $codigoItem
     * @param ?float $percentualTributos
     * @param ?float $valorBaseStRetencao
     * @param ?float $valorStRetencao
     * @param ?float $valorICMSSubstituto
     * @param ?string $codigoExcecaoTipi
     * @param ?string $classeEnquadramentoIpi
     * @param ?float $valorIpiFixo
     * @param ?string $codigoSeloIpi
     * @param ?float $valorPisFixo
     * @param ?float $valorCofinsFixo
     * @param ?string $codigoANP
     * @param ?string $descricaoANP
     * @param ?float $percentualGLP
     * @param ?float $percentualGasNacional
     * @param ?float $percentualGasImportado
     * @param ?float $valorPartida
     * @param ?TipoArmamento $tipoArmamento
     * @param ?string $descricaoCompletaArmamento
     * @param ?string $dadosAdicionais
     * @param ?Id $grupoProduto
     */
    public function __construct(
        public ?int $origem,
        public ?string $nFCI,
        public ?string $ncm,
        public ?string $cest,
        public ?string $codigoListaServicos,
        public ?string $spedTipoItem,
        public ?string $codigoItem,
        public ?float $percentualTributos,
        public ?float $valorBaseStRetencao,
        public ?float $valorStRetencao,
        public ?float $valorICMSSubstituto,
        public ?string $codigoExcecaoTipi,
        public ?string $classeEnquadramentoIpi,
        public ?float $valorIpiFixo,
        public ?string $codigoSeloIpi,
        public ?float $valorPisFixo,
        public ?float $valorCofinsFixo,
        public ?string $codigoANP,
        public ?string $descricaoANP,
        public ?float $percentualGLP,
        public ?float $percentualGasNacional,
        public ?float $percentualGasImportado,
        public ?float $valorPartida,
        public ?TipoArmamento $tipoArmamento,
        public ?string $descricaoCompletaArmamento,
        public ?string $dadosAdicionais,
        public ?Id $grupoProduto,
    ) {
    }
}
