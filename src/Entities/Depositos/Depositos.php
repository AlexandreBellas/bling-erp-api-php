<?php

namespace AleBatistella\BlingErpApi\Entities\Depositos;

use AleBatistella\BlingErpApi\Entities\Depositos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Depositos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Depositos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Depositos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Depositos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com depósitos.
 *
 * @see https://developer.bling.com.br/referencia#/Dep%C3%B3sitos
 */
class Depositos extends BaseEntity
{
    /**
     * Obtém depósitos.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Dep%C3%B3sitos/get_depositos
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "depositos",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um depósito.
     * 
     * @param int $idDeposito ID do depósito
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Dep%C3%B3sitos/get_depositos__idDeposito_
     */
    public function find(int $idDeposito): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "depositos/$idDeposito",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria um depósito.
     * 
     * @param array $body Corpo da requisição
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Dep%C3%B3sitos/post_depositos
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "depositos",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um depósito.
     * 
     * @param int $idDeposito ID do depósito
     * @param array $body Corpo da requisição
     * 
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Dep%C3%B3sitos/put_depositos__idDeposito_
     */
    public function update(int $idDeposito, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "depositos/$idDeposito",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
