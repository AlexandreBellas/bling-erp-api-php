<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataMidia extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param FindResponseDataMidiaVideo $video
     * @param FindResponseDataMidiaImagens $imagens
     */
    public function __construct(
        public FindResponseDataMidiaVideo $video,
        public FindResponseDataMidiaImagens $imagens,
    ) {
    }
}
