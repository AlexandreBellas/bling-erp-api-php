<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $pedidoVenda
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $notaFiscal
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $servico
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Find\FindResponseDataRastreamento $rastreamento
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Find\FindResponseDataDimensao $dimensao
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $embalagem
     * @param string $dataSaida
     * @param int $prazoEntregaPrevisto
     * @param float $fretePrevisto
     * @param float $valorDeclarado
     * @param bool $avisoRecebimento
     * @param bool $maoPropria
     */
    public function __construct(
        public Id $pedidoVenda,
        public Id $notaFiscal,
        public Id $servico,
        public FindResponseDataRastreamento $rastreamento,
        public FindResponseDataDimensao $dimensao,
        public Id $embalagem,
        public string $dataSaida,
        public int $prazoEntregaPrevisto,
        public float $fretePrevisto,
        public float $valorDeclarado,
        public bool $avisoRecebimento,
        public bool $maoPropria,
    ) {
    }
}
