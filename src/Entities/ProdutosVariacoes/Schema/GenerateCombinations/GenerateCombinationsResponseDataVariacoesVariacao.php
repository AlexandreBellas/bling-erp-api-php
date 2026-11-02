<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GenerateCombinationsResponseDataVariacoesVariacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $nome
     * @param int $ordem
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations\GenerateCombinationsResponseDataVariacoesVariacaoProdutoPai $produtoPai
     */
    public function __construct(
        public string $nome,
        public int $ordem,
        public GenerateCombinationsResponseDataVariacoesVariacaoProdutoPai $produtoPai,
    ) {
    }
}
