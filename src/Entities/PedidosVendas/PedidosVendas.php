<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas;

use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\GenerateNfce\GenerateNfceResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\GenerateNfe\GenerateNfeResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\PostAccounts\PostAccountsResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\PostStockToDeposit\PostStockToDepositResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\PostStock\PostStockResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\ReverseAccounts\ReverseAccountsResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\ReverseStock\ReverseStockResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Pedidos de Vendas.
 *
 * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas
 */
class PedidosVendas extends BaseEntity
{
    /**
     * Remove pedidos de vendas.
     *
     * @param int[] $idsPedidosVendas IDs dos pedidos de vendas
     *
     * @return DeleteManyResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/delete_pedidos_vendas
     */
    public function deleteMany(array $idsPedidosVendas): DeleteManyResponse
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "pedidos/vendas",
                queryParams: ['idsPedidosVendas' => $idsPedidosVendas]
            )
        );

        return DeleteManyResponse::fromResponse($response);
    }

    /**
     * Remove um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/delete_pedidos_vendas__idPedidoVenda_
     */
    public function delete(int $idPedidoVenda): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém pedidos de vendas.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/get_pedidos_vendas
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "pedidos/vendas",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/get_pedidos_vendas__idPedidoVenda_
     */
    public function find(int $idPedidoVenda): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Altera a situação de um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     * @param int $idSituacao ID da situação do pedido de venda
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/patch_pedidos_vendas__idPedidoVenda__situacoes__idSituacao_
     */
    public function changeSituation(int $idPedidoVenda, int $idSituacao): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/situacoes/$idSituacao",
            )
        );

        return ChangeSituationResponse::fromResponse($response);
    }

    /**
     * Cria um pedido de venda.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Lança o estoque de um pedido de venda especificando o depósito.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     * @param int $idDeposito ID do depósito de estoque
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas__idPedidoVenda__lancar_estoque__idDeposito_
     */
    public function postStockToDeposit(int $idPedidoVenda, int $idDeposito): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/lancar-estoque/$idDeposito",
            )
        );

        return PostStockToDepositResponse::fromResponse($response);
    }

    /**
     * Lança o estoque de um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas__idPedidoVenda__lancar_estoque
     */
    public function postStock(int $idPedidoVenda): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/lancar-estoque",
            )
        );

        return PostStockResponse::fromResponse($response);
    }

    /**
     * Estorna o estoque de um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas__idPedidoVenda__estornar_estoque
     */
    public function reverseStock(int $idPedidoVenda): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/estornar-estoque",
            )
        );

        return ReverseStockResponse::fromResponse($response);
    }

    /**
     * Lança as contas de um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas__idPedidoVenda__lancar_contas
     */
    public function postAccounts(int $idPedidoVenda): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/lancar-contas",
            )
        );

        return PostAccountsResponse::fromResponse($response);
    }

    /**
     * Estorna as contas de um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas__idPedidoVenda__estornar_contas
     */
    public function reverseAccounts(int $idPedidoVenda): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/estornar-contas",
            )
        );

        return ReverseAccountsResponse::fromResponse($response);
    }

    /**
     * Gera nota fiscal eletrônica a partir do pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return GenerateNfeResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas__idPedidoVenda__gerar_nfe
     */
    public function generateNfe(int $idPedidoVenda): GenerateNfeResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/gerar-nfe",
            )
        );

        return GenerateNfeResponse::fromResponse($response);
    }

    /**
     * Gera nota fiscal de consumidor eletrônica a partir do pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     *
     * @return GenerateNfceResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/post_pedidos_vendas__idPedidoVenda__gerar_nfce
     */
    public function generateNfce(int $idPedidoVenda): GenerateNfceResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda/gerar-nfce",
            )
        );

        return GenerateNfceResponse::fromResponse($response);
    }

    /**
     * Altera um pedido de venda.
     *
     * @param int $idPedidoVenda ID do pedido de venda
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Pedidos%20-%20Vendas/put_pedidos_vendas__idPedidoVenda_
     */
    public function update(int $idPedidoVenda, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "pedidos/vendas/$idPedidoVenda",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
