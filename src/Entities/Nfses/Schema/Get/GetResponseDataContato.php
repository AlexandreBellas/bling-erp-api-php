<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetResponseDataContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param string $numeroDocumento
     * @param string $email
     */
    public function __construct(
        public int $id,
        public string $nome,
        public string $numeroDocumento,
        public string $email,
    ) {
    }
}
