<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores;

use AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Vendedores.
 *
 * @see https://developer.bling.com.br/referencia#/Vendedores
 */
class Vendedores extends BaseEntity
{
    /**
     * Obtém vendedores.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Vendedores/get_vendedores
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "vendedores",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém um vendedor.
     *
     * @param int $idVendedor ID do vendedor
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Vendedores/get_vendedores__idVendedor_
     */
    public function find(int $idVendedor): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "vendedores/$idVendedor",
            )
        );

        return FindResponse::fromResponse($response);
    }
}
