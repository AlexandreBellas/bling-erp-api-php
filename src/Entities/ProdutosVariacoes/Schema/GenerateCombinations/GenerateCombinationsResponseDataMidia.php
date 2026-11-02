<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GenerateCombinationsResponseDataMidia extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations\GenerateCombinationsResponseDataMidiaVideo $video
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations\GenerateCombinationsResponseDataMidiaImagens $imagens
     */
    public function __construct(
        public GenerateCombinationsResponseDataMidiaVideo $video,
        public GenerateCombinationsResponseDataMidiaImagens $imagens,
    ) {
    }
}
