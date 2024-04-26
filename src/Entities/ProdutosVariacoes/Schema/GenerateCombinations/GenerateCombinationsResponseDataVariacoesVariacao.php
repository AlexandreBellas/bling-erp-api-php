<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GenerateCombinationsResponseDataVariacoesVariacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $nome
     * @param int $ordem
     * @param GenerateCombinationsResponseDataVariacoesVariacaoProdutoPai $produtoPai
     */
    public function __construct(
        public string $nome,
        public int $ordem,
        public GenerateCombinationsResponseDataVariacoesVariacaoProdutoPai $produtoPai,
    ) {
    }
}
