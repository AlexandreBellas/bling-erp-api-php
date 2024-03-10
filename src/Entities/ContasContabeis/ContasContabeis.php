<?php

namespace AleBatistella\BlingErpApi\Entities\ContasContabeis;

use AleBatistella\BlingErpApi\Entities\ContasContabeis\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\ContasContabeis\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ContasContabeis\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com contas contábeis.
 *
 * @see https://developer.bling.com.br/referencia#/Contas%20Cont%C3%A1beis
 */
class ContasContabeis extends BaseEntity
{
    /**
     * Obtém contas contábeis.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Contas%20Cont%C3%A1beis/get_contas_contabeis
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "contas-contabeis",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma conta contábil.
     * 
     * @param int $idContaContabil ID da conta contábil
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Contas%20Cont%C3%A1beis/get_contas_contabeis__idContaContabil_
     */
    public function find(int $idContaContabil): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "contas-contabeis/$idContaContabil",
            )
        );

        return FindResponse::fromResponse($response);
    }
}
