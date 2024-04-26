<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataVariacoesVariacaoProdutoPai extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param bool $cloneInfo
     */
    public function __construct(
        public bool $cloneInfo
    ) {
    }
}
