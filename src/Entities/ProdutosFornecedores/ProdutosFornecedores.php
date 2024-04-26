<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosFornecedores;

use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Produtos - Fornecedores.
 *
 * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Fornecedores
 */
class ProdutosFornecedores extends BaseEntity
{
    /**
     * Remove um produto fornecedor.
     *
     * @param int $idProdutoFornecedor ID do produto fornecedor
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Fornecedores/delete_produtos_fornecedores__idProdutoFornecedor_
     */
    public function delete(int $idProdutoFornecedor): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "produtos/fornecedores/$idProdutoFornecedor",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém produtos fornecedores.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Fornecedores/get_produtos_fornecedores
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "produtos/fornecedores",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um produto fornecedor.
     *
     * @param int $idProdutoFornecedor ID do produto fornecedor
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Fornecedores/get_produtos_fornecedores__idProdutoFornecedor_
     */
    public function find(int $idProdutoFornecedor): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "produtos/fornecedores/$idProdutoFornecedor",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria um produto fornecedor.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Fornecedores/post_produtos_fornecedores
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "produtos/fornecedores",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um produto fornecedor.
     *
     * @param int $idProdutoFornecedor ID do produto fornecedor
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Fornecedores/put_produtos_fornecedores__idProdutoFornecedor_
     */
    public function update(int $idProdutoFornecedor, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "produtos/fornecedores/$idProdutoFornecedor",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
