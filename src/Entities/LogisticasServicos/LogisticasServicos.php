<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasServicos;

use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com logísticas - serviços.
 *
 * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Servi%C3%A7os
 */
class LogisticasServicos extends BaseEntity
{
    /**
     * Obtém serviços de logísticas.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Servi%C3%A7os/get_logisticas_servicos
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "logisticas/servicos",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um servico de logística.
     *
     * @param int $idLogisticaServico ID do serviço
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Servi%C3%A7os/get_logisticas_servicos__idLogisticaServico_
     */
    public function find(int $idLogisticaServico): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "logisticas/servicos/$idLogisticaServico",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Desativa ou ativa um serviço de uma logística.
     *
     * @param int $idLogisticaServico ID do serviço
     * @param array $body Corpo da requisição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Servi%C3%A7os/patch_logisticas__idLogisticaServico__situacoes
     */
    public function changeSituation(int $idLogisticaServico, array $body): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "logisticas/$idLogisticaServico/situacoes",
                body: $body
            )
        );

        return ChangeSituationResponse::fromResponse($response);
    }

    /**
     * Cria um serviço de logística.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Servi%C3%A7os/post_logisticas_servicos
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "logisticas/servicos",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um serviço de logística pelo ID.
     *
     * @param int $idLogisticaServico ID do serviço
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Servi%C3%A7os/put_logisticas_servicos__idLogisticaServico_
     */
    public function update(int $idLogisticaServico, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "logisticas/servicos/$idLogisticaServico",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
