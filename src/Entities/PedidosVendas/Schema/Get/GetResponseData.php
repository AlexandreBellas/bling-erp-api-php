<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?int $numero
     * @param ?string $numeroLoja
     * @param string $data
     * @param string $dataSaida
     * @param string $dataPrevista
     * @param ?float $totalProdutos
     * @param ?float $total
     * @param \AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get\GetResponseDataContato $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get\GetResponseDataSituacao $situacao
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $loja
     */
    public function __construct(
        public ?int $id,
        public ?int $numero,
        public ?string $numeroLoja,
        public string $data,
        public string $dataSaida,
        public string $dataPrevista,
        public ?float $totalProdutos,
        public ?float $total,
        public GetResponseDataContato $contato,
        public ?GetResponseDataSituacao $situacao,
        public ?Id $loja,
    ) {
    }
}
