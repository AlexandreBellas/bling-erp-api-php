<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes;

use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Read\ReadResponse;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\GetQuantity\GetQuantityResponse;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\GetQuantity\GetQuantityParams;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com notificações.
 *
 * @see https://developer.bling.com.br/referencia#/Notifica%C3%A7%C3%B5es
 */
class Notificacoes extends BaseEntity
{
    /**
     * Obtém todas as notificações de uma empresa em um período.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Notifica%C3%A7%C3%B5es/get_notificacoes
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "notificacoes",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém a quantidade de notificações de uma empresa em um período.
     * 
     * @param GetQuantityParams|array|null $params
     * 
     * @return GetQuantityResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Notifica%C3%A7%C3%B5es/get_notificacoes_quantidade
     */
    public function getQuantity(GetQuantityParams|array|null $params = null): GetQuantityResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "notificacoes/quantidade",
                queryParams: $params
            )
        );

        return GetQuantityResponse::fromResponse($response);
    }

    /**
     * Marca notificação como lida.
     * 
     * @param string $idNotificacao ULID da notificação
     * 
     * @return ReadResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Notifica%C3%A7%C3%B5es/post_notificacoes__idNotificacao__confirmar_leitura
     */
    public function read(string $idNotificacao): ReadResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "notificacoes/$idNotificacao/confirmar-leitura",
            )
        );

        return ReadResponse::fromResponse($response);
    }
}
