<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataMidia extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataMidiaVideo $video
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataMidiaImagens $imagens
     */
    public function __construct(
        public FindResponseDataMidiaVideo $video,
        public FindResponseDataMidiaImagens $imagens,
    ) {
    }
}
