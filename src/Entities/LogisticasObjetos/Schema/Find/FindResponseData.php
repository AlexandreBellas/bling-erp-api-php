<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param Id $pedidoVenda
     * @param Id $notaFiscal
     * @param Id $servico
     * @param FindResponseDataRastreamento $rastreamento
     * @param FindResponseDataDimensao $dimensao
     * @param Id $embalagem
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
