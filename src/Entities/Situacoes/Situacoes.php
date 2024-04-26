<?php

namespace AleBatistella\BlingErpApi\Entities\Situacoes;

use AleBatistella\BlingErpApi\Entities\Situacoes\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\Situacoes\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Situacoes\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Situacoes\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Situacoes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Situacoes\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Situações.
 *
 * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es
 */
class Situacoes extends BaseEntity
{
    /**
     * Remove uma situação.
     *
     * @param int $idSituacao ID da situação
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es/delete_situacoes__idSituacao_
     */
    public function delete(int $idSituacao): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "situacoes/$idSituacao",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém uma situação.
     *
     * @param int $idSituacao ID da situação
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es/get_situacoes__idSituacao_
     */
    public function find(int $idSituacao): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "situacoes/$idSituacao",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma situação.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es/post_situacoes
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "situacoes",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera uma situação.
     *
     * @param int $idSituacao ID da situação
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es/put_situacoes__idSituacao_
     */
    public function update(int $idSituacao, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "situacoes/$idSituacao",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
