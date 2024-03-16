<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseDataObjetos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?Id $remessa
     * @param Id $pedidoVenda
     * @param Id $notaFiscal
     * @param FindResponseDataObjetosServico $servico
     * @param FindResponseDataObjetosRastreamento $rastreamento
     * @param FindResponseDataObjetosDimensao $dimensao
     * @param Id $embalagem
     * @param string $dataSaida
     * @param int $prazoEntregaPrevisto
     * @param float $fretePrevisto
     * @param float $valorDeclarado
     * @param bool $avisoRecebimento
     * @param bool $maoPropria
     */
    public function __construct(
        public int $id,
        public ?Id $remessa,
        public Id $pedidoVenda,
        public Id $notaFiscal,
        public FindResponseDataObjetosServico $servico,
        public FindResponseDataObjetosRastreamento $rastreamento,
        public FindResponseDataObjetosDimensao $dimensao,
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
