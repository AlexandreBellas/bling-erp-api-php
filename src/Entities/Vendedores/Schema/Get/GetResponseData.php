<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get;

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
     * @param ?float $descontoLimite
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $loja
     * @param \AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get\GetResponseDataContato $contato
     */
    public function __construct(
        public ?int $id,
        public ?float $descontoLimite,
        public Id $loja,
        public GetResponseDataContato $contato,
    ) {
    }
}
