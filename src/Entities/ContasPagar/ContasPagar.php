<?php

namespace AleBatistella\BlingErpApi\Entities\ContasPagar;

use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Download\DownloadResponse;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com contas a pagar.
 *
 * @see https://developer.bling.com.br/referencia#/Contas%20a%20Pagar
 */
class ContasPagar extends BaseEntity
{
    /**
     * Remove uma conta a pagar.
     *
     * @param int $idContaPagar ID da conta a pagar.
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Pagar/delete_contas_pagar__idContaPagar_
     */
    public function delete(int $idContaPagar): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "contas/pagar/$idContaPagar"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém contas a pagar.
     *
     * @param GetParams|array|null $params Parâmetros para a busca.
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Pagar/get_contas_pagar
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "contas/pagar",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma conta a pagar.
     * 
     * @param int $idContaPagar ID da conta a pagar.
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Pagar/get_contas_pagar__idContaPagar_
     */
    public function find(int $idContaPagar): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "contas/pagar/$idContaPagar",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma conta a pagar.
     * 
     * @param array $body Corpo da requisição.
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Pagar/post_contas_pagar
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "contas/pagar",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Cria o recebimento de uma conta a pagar.
     * 
     * @param int $idContaPagar ID da conta a pagar.
     * @param array $body Corpo da requisição.
     * 
     * @return DownloadResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Pagar/post_contas_pagar__idContaPagar__baixar
     */
    public function download(int $idContaPagar, array $body): DownloadResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "contas/pagar/$idContaPagar/baixar",
                body: $body
            )
        );

        return DownloadResponse::fromResponse($response);
    }

    /**
     * Atualiza uma conta a pagar.
     * 
     * @param int $idContaPagar ID da categoria de produto
     * @param array $body Corpo da requisição.
     * 
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Pagar/put_contas_pagar__idContaPagar_
     */
    public function update(int $idContaPagar, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "contas/pagar/$idContaPagar",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
