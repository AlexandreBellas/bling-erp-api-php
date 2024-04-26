<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer;

use AleBatistella\BlingErpApi\Entities\Shared\Enum\Genero;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindFinalCustomerResponseDataDadosAdicionais extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $dataNascimento
     * @param ?Genero $sexo
     * @param ?string $naturalidade
     */
    public function __construct(
        public ?string $dataNascimento,
        public ?Genero $sexo,
        public ?string $naturalidade,
    ) {
    }
}
