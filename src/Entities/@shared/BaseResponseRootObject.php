<?php

namespace AleBatistella\BlingErpApi\Entities\Shared;

use AleBatistella\BlingErpApi\Contracts\IResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Classe base para objetos raiz de retorno.
 */
readonly abstract class BaseResponseRootObject extends BaseResponseObject implements IResponseRootObject
{
    /** 
     * @inheritDoc
     */
    public abstract static function fromResponse(ResponseOptions $response): static|null;

    /**
     * Lança `BlingInternalException` caso a resposta da API esteja
     * inconsistente.
     *
     * @param ResponseOptions $response
     *
     * @return never
     */
    protected static function throwForInconsistentResponseOptions(ResponseOptions $response): never
    {
        throw new BlingInternalException(
            message: "Resposta inconsistente da API: $response->method $response->endpoint",
            responseHeaders: $response->headers,
            responseBody: $response->body,
            code: $response->status,
        );
    }
}