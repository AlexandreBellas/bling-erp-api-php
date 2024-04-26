<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesTransicoes;

use AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Situações - Transições.
 *
 * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20Transi%C3%A7%C3%B5es
 */
class SituacoesTransicoes extends BaseEntity
{
    /**
     * Remove uma transição.
     *
     * @param int $idTransicao ID da transição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20Transi%C3%A7%C3%B5es/delete_situacoes_transicoes__idTransicao_
     */
    public function delete(int $idTransicao): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "situacoes/transicoes/$idTransicao",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém uma transição.
     *
     * @param int $idTransicao ID da transição
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20Transi%C3%A7%C3%B5es/get_situacoes_transicoes__idTransicao_
     */
    public function find(int $idTransicao): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "situacoes/transicoes/$idTransicao",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma transição.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20Transi%C3%A7%C3%B5es/post_situacoes_transicoes
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "situacoes/transicoes",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera uma transição.
     *
     * @param int $idTransicao ID da transição
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20Transi%C3%A7%C3%B5es/put_situacoes_transicoes__idTransicao_
     */
    public function update(int $idTransicao, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "situacoes/transicoes/$idTransicao",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
