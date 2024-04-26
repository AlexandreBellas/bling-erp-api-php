<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

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
