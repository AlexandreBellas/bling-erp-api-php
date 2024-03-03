<?php

namespace AleBatistella\BlingErpApi\Entities\ContatosTipos;

use AleBatistella\BlingErpApi\Entities\ContatosTipos\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\ContatosTipos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com contatos - tipos.
 *
 * @see https://developer.bling.com.br/referencia#/Contatos%20-%20Tipos
 */
class ContatosTipos extends BaseEntity
{
    /**
     * Obtém tipos de contato.
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Contatos%20-%20Tipos/get_contatos_tipos
     */
    public function get(): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "contatos/tipos"
            )
        );

        return GetResponse::fromResponse($response);
    }
}
