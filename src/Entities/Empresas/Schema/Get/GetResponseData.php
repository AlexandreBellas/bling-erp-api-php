<?php

namespace AleBatistella\BlingErpApi\Entities\Empresas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $id
     * @param ?string $nome
     * @param ?string $cnpj
     * @param ?string $email
     * @param ?string $dataContrato
     */
    public function __construct(
        public ?string $id,
        public ?string $nome,
        public ?string $cnpj,
        public ?string $email,
        public ?string $dataContrato,
    ) {}
}
