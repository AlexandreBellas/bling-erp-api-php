<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao;

use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand\GenerateOverDemandResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com ordens de produção.
 *
 * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o
 */
class OrdensDeProducao extends BaseEntity
{
    /**
     * Remove uma ordem de produção.
     *
     * @param int $idOrdemProducao ID da ordem de produção
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o/delete_ordens_producao__idOrdemProducao_
     */
    public function delete(int $idOrdemProducao): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "ordens-producao/$idOrdemProducao"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém ordens de produção.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o/get_ordens_producao
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "ordens-producao",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma ordem de produção.
     * 
     * @param int $idOrdemProducao ID da ordem de produção
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o/get_ordens_producao__idOrdemProducao_
     */
    public function find(int $idOrdemProducao): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "ordens-producao/$idOrdemProducao",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma ordem de produção.
     * 
     * @param array $body Corpo da requisição
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o/post_ordens_producao
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "ordens-producao",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Gera ordens de produção sob demanda.
     * 
     * @return GenerateOverDemandResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o/post_ordens_producao_gerar_sob_demanda
     */
    public function generateOverDemand(): GenerateOverDemandResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "ordens-producao/gerar-sob-demanda"
            )
        );

        return GenerateOverDemandResponse::fromResponse($response);
    }

    /**
     * Altera uma ordem de produção.
     * 
     * @param int $idOrdemProducao ID da ordem de produção
     * @param array $body Corpo da requisição
     * 
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o/put_ordens_producao__idOrdemProducao_
     */
    public function update(int $idOrdemProducao, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "ordens-producao/$idOrdemProducao",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }


    /**
     * Altera a situação de uma ordem de produção.
     * 
     * @param int $idOrdemProducao ID da ordem de produção
     * @param array $body Corpo da requisição
     * 
     * @return ChangeSituationResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Ordens%20de%20Produ%C3%A7%C3%A3o/put_ordens_producao__idOrdemProducao__situacoes
     */
    public function changeSituation(int $idOrdemProducao, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "ordens-producao/$idOrdemProducao/situacoes",
                body: $body
            )
        );

        return ChangeSituationResponse::fromResponse($response);
    }
}
