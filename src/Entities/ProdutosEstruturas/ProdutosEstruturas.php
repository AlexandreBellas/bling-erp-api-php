<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas;

use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\DeleteComponents\DeleteComponentsResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\ChangeComponent\ChangeComponentResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\AddComponent\AddComponentResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Produtos - Estruturas.
 *
 * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Estruturas
 */
class ProdutosEstruturas extends BaseEntity
{
    /**
     * Remove componentes específicos de um produto com composição.
     *
     * @param int $idProdutoEstrutura ID do produto com composição
     * @param int[] $idsComponentes IDs dos produtos
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Estruturas/delete_produtos_estruturas__idProdutoEstrutura__componentes
     */
    public function deleteComponents(int $idProdutoEstrutura, array $idsComponentes): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "produtos/estruturas/$idProdutoEstrutura/componentes",
                queryParams: ['idsComponentes' => $idsComponentes]
            )
        );

        return DeleteComponentsResponse::fromResponse($response);
    }

    /**
     * Remove a estrutura de múltiplos produtos.
     *
     * @param int[] $idsProdutos IDs dos produtos
     *
     * @return DeleteResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Estruturas/delete_produtos_estruturas
     */
    public function delete(array $idsProdutos): DeleteResponse
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "produtos/estruturas",
                queryParams: ['idsProdutos' => $idsProdutos]
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém a estrutura de um produto com composição.
     *
     * @param int $idProdutoEstrutura ID do produto com composição
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Estruturas/get_produtos_estruturas__idProdutoEstruturaEstrutura_
     */
    public function find(int $idProdutoEstrutura): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "produtos/estruturas/$idProdutoEstrutura",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Altera um componente de uma estrutura.
     *
     * @param int $idProdutoEstrutura ID do produto com composição
     * @param int $idComponente ID do componente
     * @param array $body Corpo da requisição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Estruturas/patch_produtos_estruturas__idProdutoEstrutura__componentes__idComponente_
     */
    public function changeComponent(int $idProdutoEstrutura, int $idComponente, array $body): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "produtos/estruturas/$idProdutoEstrutura/componentes/$idComponente",
                body: $body
            )
        );

        return ChangeComponentResponse::fromResponse($response);
    }

    /**
     * Adiciona componente(s) a uma estrutura.
     *
     * @param int $idProdutoEstrutura ID do produto com composição
     * @param array $body Corpo da requisição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Estruturas/post_produtos_estruturas__idProdutoEstrutura__componentes
     */
    public function addComponent(int $idProdutoEstrutura, array $body): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "produtos/estruturas/$idProdutoEstrutura/componentes",
                body: $body
            )
        );

        return AddComponentResponse::fromResponse($response);
    }

    /**
     * Altera a estrutura de um produto com composição.
     *
     * @param int $idProdutoEstrutura ID do produto com composição
     * @param array $body Corpo da requisição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Produtos%20-%20Estruturas/put_produtos_estruturas__idProdutoEstrutura_
     */
    public function update(int $idProdutoEstrutura, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "produtos/estruturas/$idProdutoEstrutura",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
