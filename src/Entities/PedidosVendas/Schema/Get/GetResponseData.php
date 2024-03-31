<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

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
     * @param GetResponseDataContato $contato
     * @param ?GetResponseDataSituacao $situacao
     * @param ?Id $loja
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
