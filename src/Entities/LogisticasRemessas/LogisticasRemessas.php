<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas;

use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\GetByLogistic\GetByLogisticResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com logísticas - remessas.
 *
 * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Remessas
 */
class LogisticasRemessas extends BaseEntity
{
    /**
     * Remove uma remessa de postagem.
     *
     * @param int $idRemessa ID da logística
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Remessas/delete_logisticas_remessas__idRemessa_
     */
    public function delete(int $idRemessa): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "logisticas/remessas/$idRemessa"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém uma remessa de postagem.
     *
     * @param int $idRemessa ID da logística
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Remessas/get_logisticas_remessas__idRemessa_
     */
    public function find(int $idRemessa): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "logisticas/remessas/$idRemessa",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Obtém as remessas de postagem de uma logística.
     *
     * @param int $idLogistica ID da logística
     *
     * @return GetByLogisticResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Remessas/get_logisticas__idLogistica__remessas
     */
    public function getByLogistic(int $idLogistica): GetByLogisticResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "logisticas/$idLogistica/remessas"
            )
        );

        return GetByLogisticResponse::fromResponse($response);
    }

    /**
     * Cria uma remessa de postagem de uma logística.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Remessas/post_logisticas_remessas
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "logisticas/remessas",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera uma remessa de postagem.
     *
     * @param int $idRemessa ID da logística
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Remessas/put_logisticas_remessas__idRemessa_
     */
    public function update(int $idRemessa, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "logisticas/remessas/$idRemessa",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
