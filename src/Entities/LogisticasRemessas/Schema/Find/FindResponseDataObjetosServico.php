<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataObjetosServico extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param string $codigo
     */
    public function __construct(
        public int $id,
        public string $nome,
        public string $codigo,
    ) {
    }
}
