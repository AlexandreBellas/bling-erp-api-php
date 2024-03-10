<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasProdutos;

use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com categorias - produtos.
 *
 * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Produtos
 */
class CategoriasProdutos extends BaseEntity
{
    /**
     * Remove uma categoria de produto
     *
     * @param int $idCategoriaProduto ID da categoria de produto
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Produtos/delete_categorias_produtos__idCategoriaProduto_
     */
    public function delete(int $idCategoriaProduto): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "categorias/produtos/$idCategoriaProduto"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém categorias de produtos.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Lojas/get_categorias_lojas
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "categorias/produtos",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma categoria de produto.
     * 
     * @param int $idCategoriaProduto ID da categoria de produto
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Produtos/get_categorias_produtos__idCategoriaProduto_
     */
    public function find(int $idCategoriaProduto): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "categorias/produtos/$idCategoriaProduto",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma categoria de produto.
     * 
     * @param array $body Corpo da requisição
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Produtos/post_categorias_produtos
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "categorias/produtos",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera uma categoria de produto.
     * 
     * @param int $idCategoriaProduto ID da categoria de produto
     * @param array $body Corpo da requisição
     * 
     * @return null
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Produtos/put_categorias_produtos__idCategoriaProduto_
     */
    public function update(int $idCategoriaProduto, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "categorias/produtos/$idCategoriaProduto",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
