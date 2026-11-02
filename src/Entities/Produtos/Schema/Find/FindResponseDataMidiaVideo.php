<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataMidiaVideo extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $url
     */
    public function __construct(
        public string $url,
    ) {
    }
}
