<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques;

use AleBatistella\BlingErpApi\Entities\Estoques\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\FindBalance\FindBalanceResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances\GetBalancesResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com estoques.
 *
 * @see https://developer.bling.com.br/referencia#/Estoques
 */
class Estoques extends BaseEntity
{
    /**
     * Obtém o saldo em estoque de produtos por depósito.
     * 
     * @param int $idDeposito ID do depósito
     * @param int[] $idsProdutos IDs dos produtos
     * @param ?string $codigo Código do produto
     * 
     * @return FindBalanceResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Estoques/get_estoques_saldos__idDeposito_
     */
    public function findBalance(
        int $idDeposito,
        array $idsProdutos,
        ?string $codigo = null
    ): FindBalanceResponse {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "estoques/saldos/$idDeposito",
                queryParams: ['idsProdutos' => $idsProdutos, 'codigo' => $codigo]
            )
        );

        return FindBalanceResponse::fromResponse($response);
    }

    /**
     * Obtém o saldo em estoque de produtos.
     *
     * @param int[] $idsProdutos IDs dos produtos
     * @param ?string $codigo Código do produto
     * 
     * @return GetBalancesResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Estoques/get_estoques_saldos
     */
    public function getBalances(array $idsProdutos, ?string $codigo = null): GetBalancesResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "estoques/saldos",
                queryParams: ['idsProdutos' => $idsProdutos, 'codigo' => $codigo]
            )
        );

        return GetBalancesResponse::fromResponse($response);
    }

    /**
     * Cria um registro de estoque.
     * 
     * @param array $body Corpo da requisição
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Estoques/post_estoques
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "estoques",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um registro de estoque.
     * 
     * @param int $idEstoque ID do estoque
     * @param array $body Corpo da requisição
     * 
     * @return null
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Estoques/put_estoques__idEstoque_
     */
    public function update(int $idEstoque, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "estoques/$idEstoque",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
