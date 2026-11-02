<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GenerateCombinationsResponseDataMidiaVideo extends BaseResponseObject
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
