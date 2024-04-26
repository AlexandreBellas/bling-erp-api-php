<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindFinalCustomerResponseDataFinanceiro extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $limiteCredito
     * @param ?string $condicaoPagamento
     * @param ?Id $categoria
     */
    public function __construct(
        public ?float $limiteCredito,
        public ?string $condicaoPagamento,
        public ?Id $categoria,
    ) {
    }
}
