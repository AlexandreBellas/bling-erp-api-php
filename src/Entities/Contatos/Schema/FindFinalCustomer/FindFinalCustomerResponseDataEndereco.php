<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindFinalCustomerResponseDataEndereco extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer\FindFinalCustomerResponseDataEnderecoDados $geral
     * @param ?\AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer\FindFinalCustomerResponseDataEnderecoDados $cobranca
     */
    public function __construct(
        public ?FindFinalCustomerResponseDataEnderecoDados $geral,
        public ?FindFinalCustomerResponseDataEnderecoDados $cobranca,
    ) {
    }
}
