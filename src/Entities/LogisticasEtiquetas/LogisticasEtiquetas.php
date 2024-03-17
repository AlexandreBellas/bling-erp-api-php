<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas;

use AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com logísticas - etiquetas.
 *
 * @see https://developer.bling.com.br/referencia#/Logísticas%20-%20Etiquetas
 */
class LogisticasEtiquetas extends BaseEntity
{
    /**
     * Obtém etiquetas das vendas.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Log%C3%ADsticas%20-%20Etiquetas/get_logisticas_etiquetas
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "logisticas/etiquetas",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }
}
