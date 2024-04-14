<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosLojas;

use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\ChangeSituationMany\ChangeSituationManyResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Produtos - Lojas.
 *
 * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Lojas
 */
class ProdutosLojas extends BaseEntity
{
    /**
     * Remove o vínculo de um produto com uma loja.
     *
     * @param int $idProdutoLoja ID do vínculo do produto com a loja
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Lojas/delete_produtos_lojas__idProdutoLoja_
     */
    public function delete(int $idProdutoLoja): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "produtos/lojas/$idProdutoLoja",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém vínculos de produtos com lojas.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Lojas/get_produtos_lojas
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "produtos/lojas",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um vínculo de produto com loja.
     *
     * @param int $idProdutoLoja ID do vínculo do produto com a loja
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Lojas/get_produtos_lojas__idProdutoLoja_
     */
    public function find(int $idProdutoLoja): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "produtos/lojas/$idProdutoLoja",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria o vínculo de um produto com uma loja.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Lojas/post_produtos_lojas
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "produtos/lojas",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera o vínculo de um produto com uma loja.
     *
     * @param int $idProdutoLoja ID do vínculo do produto com a loja
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Lojas/put_produtos_lojas__idProdutoLoja_
     */
    public function update(int $idProdutoLoja, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "produtos/lojas/$idProdutoLoja",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
