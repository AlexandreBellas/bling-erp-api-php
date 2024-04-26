<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes;

use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations\GenerateCombinationsResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\ChangeAttributeName\ChangeAttributeNameResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Produtos - Variações.
 *
 * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Varia%C3%A7%C3%B5es
 */
class ProdutosVariacoes extends BaseEntity
{
    /**
     * Obtém o produto e variações.
     *
     * @param int $idProdutoPai ID do produto pai
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Varia%C3%A7%C3%B5es/get_produtos_variacoes__idProdutoPai_
     */
    public function find(int $idProdutoPai): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "produtos/variacoes/$idProdutoPai",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Altera o nome do atributo nas variações.
     *
     * @param int $idProdutoPai ID do produto pai
     * @param array $body Corpo da requisição
     *
     * @return ChangeAttributeNameResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Varia%C3%A7%C3%B5es/patch_produtos_variacoes__idProdutoPai__atributos
     */
    public function changeAttributeName(int $idProdutoPai, array $body): ChangeAttributeNameResponse
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "produtos/variacoes/$idProdutoPai/atributos",
                body: $body
            )
        );

        return ChangeAttributeNameResponse::fromResponse($response);
    }

    /**
     * Retorna o produto pai com combinações de novas variações.
     *
     * @param array $body Corpo da requisição
     *
     * @return GenerateCombinationsResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Varia%C3%A7%C3%B5es/post_produtos_variacoes_atributos_gerar_combinacoes
     */
    public function generateCombinations(array $body): GenerateCombinationsResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "produtos/variacoes/atributos/gerar-combinacoes",
                body: $body
            )
        );

        return GenerateCombinationsResponse::fromResponse($response);
    }
}
