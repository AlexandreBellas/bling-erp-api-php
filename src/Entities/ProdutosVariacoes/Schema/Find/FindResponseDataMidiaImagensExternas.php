<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataMidiaImagensExternas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $link
     */
    public function __construct(
        public string $link,
    ) {
    }
}
