<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda;

use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\GetTypes\GetTypesParams;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\GetTypes\GetTypesResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com canais de venda.
 *
 * @see https://developer.bling.com.br/referencia#/Canais%20de%20Venda
 */
class CanaisDeVenda extends BaseEntity
{
    /**
     * Obtém canais de venda.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Canais%20de%20Venda/get_canais_venda
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "canais-venda",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um canal de venda.
     * 
     * @param int $idCanalVenda ID do canal de venda
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Canais%20de%20Venda/get_canais_venda__idCanalVenda_
     */
    public function find(int $idCanalVenda): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "canais-venda/$idCanalVenda",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Obtém os tipos de canais de venda.
     *
     * @param GetTypesParams|array|null $params Parâmetros para a busca
     * 
     * @return GetTypesResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Canais%20de%20Venda/get_canais_venda_tipos
     */
    public function getTypes(GetTypesParams|array|null $params = null): GetTypesResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "canais-venda/tipos",
                queryParams: $params
            )
        );

        return GetTypesResponse::fromResponse($response);
    }
}
