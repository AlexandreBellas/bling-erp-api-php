<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos;

use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com formas de pagamento.
 *
 * @see https://developer.bling.com.br/referencia#/Formas%20de%20Pagamentos
 */
class FormasDePagamentos extends BaseEntity
{
    /**
     * Remove uma forma de pagamento.
     *
     * @param int $idFormaPagamento ID do contrato
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Formas%20de%20Pagamentos/delete_formas_pagamentos__idFormaPagamento_
     */
    public function delete(int $idFormaPagamento): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "formas-pagamentos/$idFormaPagamento"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém formas de pagamentos.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Formas%20de%20Pagamentos/get_formas_pagamentos
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "formas-pagamentos",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma forma de pagamento.
     * 
     * @param int $idFormaPagamento ID da forma de pagamento
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Formas%20de%20Pagamentos/get_formas_pagamentos__idFormaPagamento_
     */
    public function find(int $idFormaPagamento): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "formas-pagamentos/$idFormaPagamento",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Cria uma forma de pagamento.
     * 
     * @param array $body Corpo da requisição
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Formas%20de%20Pagamentos/post_formas_pagamentos
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "formas-pagamentos",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera uma forma de pagamento.
     * 
     * @param int $idFormaPagamento ID do contrato
     * @param array $body Corpo da requisição
     * 
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/FormasDePagamentos/put_contratos__idFormaPagamento_
     */
    public function update(int $idFormaPagamento, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "formas-pagamentos/$idFormaPagamento",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
