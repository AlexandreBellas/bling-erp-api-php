<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Vendedores\Enum\Situacao;

readonly final class GetResponseDataContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param Situacao $situacao
     */
    public function __construct(
        public int $id,
        public string $nome,
        public Situacao $situacao,
    ) {
    }
}
