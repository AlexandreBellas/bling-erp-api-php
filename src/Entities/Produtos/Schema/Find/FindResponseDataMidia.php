<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataMidia extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find\FindResponseDataMidiaVideo $video
     * @param \AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find\FindResponseDataMidiaImagens $imagens
     */
    public function __construct(
        public FindResponseDataMidiaVideo $video,
        public FindResponseDataMidiaImagens $imagens,
    ) {
    }
}
