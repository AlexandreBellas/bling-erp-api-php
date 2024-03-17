<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes;

use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\CalculateItemTax\CalculateItemTaxResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com naturezas de operações.
 *
 * @see https://developer.bling.com.br/referencia#/Naturezas%20de%20Opera%C3%A7%C3%B5es
 */
class NaturezasDeOperacoes extends BaseEntity
{
    /**
     * Obtém naturezas de operações.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Naturezas%20de%20Opera%C3%A7%C3%B5es/get_naturezas_operacoes
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "naturezas-operacoes",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Calcula os impostos de um item.
     *
     * @param int $idNaturezaOperacao ID da natureza de operação
     * @param array $body Corpo da requisição
     *
     * @return CalculateItemTaxResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Naturezas%20de%20Opera%C3%A7%C3%B5es/post_naturezas_operacoes__idNaturezaOperacao__calcular_imposto_item
     */
    public function calculateItemTax(int $idNaturezaOperacao, array $body): CalculateItemTaxResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "naturezas-operacoes/$idNaturezaOperacao/calcular-imposto-item",
                body: $body
            )
        );

        return CalculateItemTaxResponse::fromResponse($response);
    }
}
