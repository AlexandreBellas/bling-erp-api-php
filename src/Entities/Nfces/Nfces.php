<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces;

use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\PostAccounts\PostAccountsResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\PostStock\PostStockResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\PostStockToDeposit\PostStockToDepositResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\ReverseAccounts\ReverseAccountsResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\ReverseStock\ReverseStockResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Send\SendResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com NFC-es.
 *
 * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas
 */
class Nfces extends BaseEntity
{
    /**
     * Obtém notas fiscais de consumidor.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/get_nfce
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "nfce",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma nota fiscal de consumidor.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/get_nfce__idNotaFiscalConsumidor_
     */
    public function find(int $idNotaFiscalConsumidor): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma nota fiscal de consumidor.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/post_nfce
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfce",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Envia uma nota de consumidor.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     *
     * @return SendResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/post_nfce__idNotaFiscalConsumidor__enviar
     */
    public function send(int $idNotaFiscalConsumidor): SendResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor/enviar",
            )
        );

        return SendResponse::fromResponse($response);
    }

    /**
     * Lança as contas de uma nota fiscal.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/post_nfce__idNotaFiscalConsumidor__lancar_contas
     */
    public function postAccounts(int $idNotaFiscalConsumidor): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor/lancar-contas",
            )
        );

        return PostAccountsResponse::fromResponse($response);
    }

    /**
     * Estorna as contas de uma nota fiscal.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/post_nfce__idNotaFiscalConsumidor__estornar_contas
     */
    public function reverseAccounts(int $idNotaFiscalConsumidor): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor/estornar-contas",
            )
        );

        return ReverseAccountsResponse::fromResponse($response);
    }

    /**
     * Lança o estoque de uma nota fiscal no depósito padrão.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/post_nfce__idNotaFiscalConsumidor__lancar_estoque
     */
    public function postStock(int $idNotaFiscalConsumidor): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor/lancar-estoque",
            )
        );

        return PostStockResponse::fromResponse($response);
    }

    /**
     * Lança o estoque de uma nota fiscal especificando o depósito.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     * @param int $idDeposito ID do depósito
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/post_nfce__idNotaFiscalConsumidor__lancar_estoque__idDeposito_
     */
    public function postStockToDeposit(int $idNotaFiscalConsumidor, int $idDeposito): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor/lancar-estoque/$idDeposito",
            )
        );

        return PostStockToDepositResponse::fromResponse($response);
    }

    /**
     * Estorna o estoque de uma nota fiscal.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/post_nfce__idNotaFiscalConsumidor__estornar_estoque
     */
    public function reverseStock(int $idNotaFiscalConsumidor): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor/estornar-estoque",
            )
        );

        return ReverseStockResponse::fromResponse($response);
    }

    /**
     * Altera uma nota fiscal de consumidor.
     *
     * @param int $idNotaFiscalConsumidor ID da nota fiscal de consumidor
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20de%20Consumidor%20Eletr%C3%B4nicas/put_nfce__idNotaFiscalConsumidor_
     */
    public function update(int $idNotaFiscalConsumidor, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "nfce/$idNotaFiscalConsumidor",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
