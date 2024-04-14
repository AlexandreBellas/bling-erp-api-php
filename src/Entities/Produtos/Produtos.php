<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos;

use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\ChangeSituationMany\ChangeSituationManyResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Produtos.
 *
 * @see https://developer.bling.com.br/referencia#/Produtos
 */
class Produtos extends BaseEntity
{
    /**
     * Remove múltiplos produtos.
     *
     * @param int[] $idsProdutos IDs dos produtos
     *
     * @return DeleteManyResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/delete_produtos
     */
    public function deleteMany(array $idsProdutos): DeleteManyResponse
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "produtos",
                queryParams: ['idsProdutos' => $idsProdutos]
            )
        );

        return DeleteManyResponse::fromResponse($response);
    }

    /**
     * Remove um produto.
     *
     * @param int $idProduto ID do produto
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/delete_produtos__idProduto_
     */
    public function delete(int $idProduto): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "produtos/$idProduto",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém produtos.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/get_produtos
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "produtos",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um produto.
     *
     * @param int $idProduto ID do produto
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/get_produtos__idProduto_
     */
    public function find(int $idProduto): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "produtos/$idProduto",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Altera a situação de um produto.
     *
     * @param int $idProduto ID do produto
     * @param array $body Corpo da requisição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/patch_produtos__idProduto__situacoes
     */
    public function changeSituation(int $idProduto, array $body): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "produtos/$idProduto/situacoes",
                body: $body
            )
        );

        return ChangeSituationResponse::fromResponse($response);
    }

    /**
     * Cria um produto.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/post_produtos
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "produtos",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera a situação de múltiplos produtos.
     *
     * @param array $body Corpo da requisição
     *
     * @return ChangeSituationManyResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/post_produtos_situacoes
     */
    public function changeSituationMany(array $body): ChangeSituationManyResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "produtos/situacoes",
                body: $body
            )
        );

        return ChangeSituationManyResponse::fromResponse($response);
    }

    /**
     * Altera um produto.
     *
     * @param int $idProduto ID do produto
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos/put_produtos__idProduto_
     */
    public function update(int $idProduto, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "produtos/$idProduto",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
