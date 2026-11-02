<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetResponseDataEstoque extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $saldoVirtualTotal
     */
    public function __construct(
        public ?float $saldoVirtualTotal
    ) {}
}
