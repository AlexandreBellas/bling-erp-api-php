<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GenerateCombinationsResponseDataMidia extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param GenerateCombinationsResponseDataMidiaVideo $video
     * @param GenerateCombinationsResponseDataMidiaImagens $imagens
     */
    public function __construct(
        public GenerateCombinationsResponseDataMidiaVideo $video,
        public GenerateCombinationsResponseDataMidiaImagens $imagens,
    ) {
    }
}
