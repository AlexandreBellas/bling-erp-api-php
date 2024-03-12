<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasObjetos;

use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com logísticas - objetos.
 *
 * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Objetos
 */
class LogisticasObjetos extends BaseEntity
{
    /**
     * Remove um objeto de logística personalizada.
     *
     * @param int $idObjeto ID da objeto logístico
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Objetos/delete_logisticas_objetos__idObjeto_
     */
    public function delete(int $idObjeto): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "logisticas/objetos/$idObjeto"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém um objeto de logística.
     *
     * @param int $idObjeto ID do objeto logístico
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Objetos/get_logisticas_objetos__idObjeto_
     */
    public function find(int $idObjeto): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "logisticas/objetos/$idObjeto",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria um objeto de logística.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Objetos/post_logisticas_objetos
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "logisticas/objetos",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um objeto de logística pelo ID.
     *
     * @param int $idObjeto ID do objeto logístico
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas/put_logisticas__idObjeto_
     */
    public function update(int $idObjeto, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "logisticas/objetos/$idObjeto",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
