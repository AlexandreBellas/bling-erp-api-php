<?php

namespace AleBatistella\BlingErpApi\Entities\Logisticas;

use AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com logísticas.
 *
 * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas
 */
class Logisticas extends BaseEntity
{
    /**
     * Remove uma logística.
     *
     * @param int $idLogistica ID da logística
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas/delete_logisticas__idLogistica_
     */
    public function delete(int $idLogistica): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "logisticas/$idLogistica"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém logísticas.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas/get_logisticas
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "logisticas",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma logística.
     *
     * @param int $idLogistica ID da logística
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas/get_logisticas__idLogistica_
     */
    public function find(int $idLogistica): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "logisticas/$idLogistica",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria logística.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas/post_logisticas
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "logisticas",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera uma logística.
     *
     * @param int $idLogistica ID da logística
     * @param array $body Corpo da requisição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas/put_logisticas__idLogistica_
     */
    public function update(int $idLogistica, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "logisticas/$idLogistica",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
