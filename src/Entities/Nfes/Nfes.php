<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes;

use AleBatistella\BlingErpApi\Entities\Nfes\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\PostAccounts\PostAccountsResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\PostStock\PostStockResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\PostStockToDeposit\PostStockToDepositResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\ReverseAccounts\ReverseAccountsResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\ReverseStock\ReverseStockResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Send\SendResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com NF-es.
 *
 * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas
 */
class Nfes extends BaseEntity
{
    /**
     * Remove múltiplas notas fiscais.
     *
     * @param int[] $idsNotas IDs das notas fiscais
     *
     * @return DeleteManyResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/delete_nfe
     */
    public function deleteMany(array $idsNotas): DeleteManyResponse
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "nfe",
                queryParams: ['idsNotas' => $idsNotas]
            )
        );

        return DeleteManyResponse::fromResponse($response);
    }

    /**
     * Obtém notas fiscais.
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
                endpoint: "nfe",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma nota fiscal.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/get_nfe__idNotaFiscal_
     */
    public function find(int $idNotaFiscal): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma nota fiscal.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/post_nfe
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfe",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Envia uma nota fiscal.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     *
     * @return SendResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/post_nfe__idNotaFiscal__enviar
     */
    public function send(int $idNotaFiscal): SendResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal/enviar",
            )
        );

        return SendResponse::fromResponse($response);
    }

    /**
     * Lança as contas de uma nota fiscal.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/post_nfe__idNotaFiscal__lancar_contas
     */
    public function postAccounts(int $idNotaFiscal): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal/lancar-contas",
            )
        );

        return PostAccountsResponse::fromResponse($response);
    }

    /**
     * Estorna as contas de uma nota fiscal.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/post_nfe__idNotaFiscal__estornar_contas
     */
    public function reverseAccounts(int $idNotaFiscal): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal/estornar-contas",
            )
        );

        return ReverseAccountsResponse::fromResponse($response);
    }

    /**
     * Lança o estoque de uma nota fiscal no depósito padrão.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/post_nfe__idNotaFiscal__lancar_estoque
     */
    public function postStock(int $idNotaFiscal): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal/lancar-estoque",
            )
        );

        return PostStockResponse::fromResponse($response);
    }

    /**
     * Lança o estoque de uma nota fiscal especificando o depósito.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     * @param int $idDeposito ID do depósito
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/post_nfe__idNotaFiscal__lancar_estoque__idDeposito_
     */
    public function postStockToDeposit(int $idNotaFiscal, int $idDeposito): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal/lancar-estoque/$idDeposito",
            )
        );

        return PostStockToDepositResponse::fromResponse($response);
    }

    /**
     * Estorna o estoque de uma nota fiscal.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/post_nfe__idNotaFiscal__estornar_estoque
     */
    public function reverseStock(int $idNotaFiscal): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal/estornar-estoque",
            )
        );

        return ReverseStockResponse::fromResponse($response);
    }

    /**
     * Altera uma nota fiscal.
     *
     * @param int $idNotaFiscal ID da nota fiscal
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notas%20Fiscais%20Eletr%C3%B4nicas/put_nfe__idNotaFiscal_
     */
    public function update(int $idNotaFiscal, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "nfe/$idNotaFiscal",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
