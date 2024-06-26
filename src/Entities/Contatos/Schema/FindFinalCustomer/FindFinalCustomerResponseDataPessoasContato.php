<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindFinalCustomerResponseDataPessoasContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $descricao
     */
    public function __construct(
        public int $id,
        public ?string $descricao,
    ) {
    }
}
