<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindFinalCustomerResponseDataEndereco extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?FindFinalCustomerResponseDataEnderecoDados $geral
     * @param ?FindFinalCustomerResponseDataEnderecoDados $cobranca
     */
    public function __construct(
        public ?FindFinalCustomerResponseDataEnderecoDados $geral,
        public ?FindFinalCustomerResponseDataEnderecoDados $cobranca,
    ) {
    }
}
