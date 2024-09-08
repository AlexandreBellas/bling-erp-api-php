<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber;

use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\CancelBankSlips\CancelBankSlipsResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Download\DownloadResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips\GetBankSlipsResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips\GetBankSlipsParams;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com contas a receber.
 *
 * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber
 */
class ContasReceber extends BaseEntity
{
    /**
     * Remove uma conta a receber.
     *
     * @param int $idContaReceber ID da conta a receber
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/delete_contas_receber__idContaReceber_
     */
    public function delete(int $idContaReceber): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "contas/receber/$idContaReceber"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém contas a receber.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/get_contas_receber
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "contas/receber",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma conta a receber.
     * 
     * @param int $idContaReceber ID da conta a receber
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/get_contas_receber__idContaReceber_
     */
    public function find(int $idContaReceber): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "contas/receber/$idContaReceber",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Obtém os boletos - Bling conta.
     * 
     * @param int $idOrigem idOrigem que pode ser ID de um venda ou NF
     * @param GetBankSlipsParams|array|null $params Parâmetros da busca
     * 
     * @return GetBankSlipsResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/get_contas_receber_view_bankslips
     */
    public function getBankSlips(int $idOrigem, GetBankSlipsParams|array|null $params = null): GetBankSlipsResponse
    {
        if ($params instanceof GetBankSlipsParams) {
            $actualParams = $params->content;
        } else if (is_array($params)) {
            $actualParams = $params;
        }

        $actualParams['idOrigem'] = $idOrigem;

        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "contas/receber/boletos",
                queryParams: $actualParams
            )
        );

        return GetBankSlipsResponse::fromResponse($response);
    }


    /**
     * Cria uma conta a receber.
     * 
     * @param array $body Corpo da requisição
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/post_contas_receber
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "contas/receber",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Cria o recebimento de uma conta a receber.
     * 
     * @param int $idContaReceber ID da conta a receber
     * @param array $body Corpo da requisição
     * 
     * @return DownloadResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/post_contas_receber__idContaReceber__baixar
     */
    public function download(int $idContaReceber, array $body): DownloadResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "contas/receber/$idContaReceber/baixar",
                body: $body
            )
        );

        return DownloadResponse::fromResponse($response);
    }

    /**
     * Cancelar Boletos - Bling Conta.
     * 
     * @param array $body
     * 
     * @return null
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/post_contas_receber_cancel_bankslips
     */
    public function cancelBankSlips(array $body): null
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "contas/receber/boletos/cancelar",
                body: $body
            )
        );

        return CancelBankSlipsResponse::fromResponse($response);
    }

    /**
     * Atualiza uma conta a receber.
     * 
     * @param int $idContaReceber ID da conta a receber
     * @param array $body Corpo da requisição
     * 
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20a%20Receber/put_contas_receber__idContaReceber_
     */
    public function update(int $idContaReceber, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "contas/receber/$idContaReceber",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
