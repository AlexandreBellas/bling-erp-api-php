<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataVendedor extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param \AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find\FindResponseDataVendedorComissao $comissao
     */
    public function __construct(
        public int $id,
        public FindResponseDataVendedorComissao $comissao,
    ) {
    }
}
