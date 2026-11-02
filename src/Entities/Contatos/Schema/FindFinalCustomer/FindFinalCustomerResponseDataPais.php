<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindFinalCustomerResponseDataPais extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $nome
     */
    public function __construct(
        public ?string $nome,
    ) {
    }
}
