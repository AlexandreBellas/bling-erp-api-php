<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataVendedor extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param FindResponseDataVendedorComissao $comissao
     */
    public function __construct(
        public int $id,
        public FindResponseDataVendedorComissao $comissao,
    ) {
    }
}
