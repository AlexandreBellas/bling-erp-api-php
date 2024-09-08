<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos;

use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\ChangeSituationMany\ChangeSituationManyResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Grupos de Produtos.
 *
 * @see https://developer.bling.com.br/referencia#/Grupos%20de%20Produtos
 */
class GruposDeProdutos extends BaseEntity
{
    /**
     * Remove múltiplos grupos de produtos.
     *
     * @param int[] $idsGruposProdutos IDs dos grupos de produtos
     *
     * @return DeleteManyResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Grupos%20de%20Produtos/delete_grupos_produtos
     */
    public function deleteMany(array $idsGruposProdutos): DeleteManyResponse
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "grupos-produtos",
                queryParams: ['idsGruposProdutos' => $idsGruposProdutos]
            )
        );

        return DeleteManyResponse::fromResponse($response);
    }

    /**
     * Remove um grupo de produtos.
     *
     * @param int $idGrupoProduto ID do grupo de produto
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Grupos%20de%20Produtos/delete_grupos_produtos__idGrupoProduto_
     */
    public function delete(int $idGrupoProduto): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "grupos-produtos/$idGrupoProduto",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém grupos de produtos.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Grupos%20de%20Produtos/get_grupos_produtos
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "grupos-produtos",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um grupo de produtos.
     *
     * @param int $idGrupoProduto ID do grupo de produto
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Grupos%20de%20Produtos/get_grupos_produtos__idGrupoProduto_
     */
    public function find(int $idGrupoProduto): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "grupos-produtos/$idGrupoProduto",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria um grupo de produtos.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Grupos%20de%20Produtos/post_grupos_produtos
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "grupos-produtos",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um grupo de produtos.
     *
     * @param int $idGrupoProduto ID do grupo de produto
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Grupos%20de%20Produtos/put_grupos_produtos__idGrupoProduto_
     */
    public function update(int $idGrupoProduto, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "grupos-produtos/$idGrupoProduto",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
