<?php

namespace AleBatistella\BlingErpApi\Contracts;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Interface para o objeto raiz de resposta.
 */
interface IResponseRootObject extends IResponseObject
{
    /**
     * Constrói a partir de uma resposta de requisição.
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions $response
     */
    public static function fromResponse(ResponseOptions $response): ?static;
}
