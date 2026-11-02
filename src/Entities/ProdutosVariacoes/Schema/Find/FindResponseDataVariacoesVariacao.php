<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataVariacoesVariacao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $nome
     * @param int $ordem
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataVariacoesVariacaoProdutoPai $produtoPai
     */
    public function __construct(
        public string $nome,
        public int $ordem,
        public FindResponseDataVariacoesVariacaoProdutoPai $produtoPai,
    ) {
    }
}
