<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataObjetos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $remessa
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $pedidoVenda
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $notaFiscal
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find\FindResponseDataObjetosServico $servico
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find\FindResponseDataObjetosRastreamento $rastreamento
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find\FindResponseDataObjetosDimensao $dimensao
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $embalagem
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
