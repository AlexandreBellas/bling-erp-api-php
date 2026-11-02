<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Error;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Objeto representativo da resposta da requisição com erro.
 */
readonly final class ErrorResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error $error
     */
    public function __construct(public Error $error)
    {
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions $response
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        $content = $response->body?->content;

        if (!is_array($content)) {
            throw new BlingInternalException(
                message: "Resposta de erro sem JSON: $response->method $response->endpoint",
                responseHeaders: $response->headers,
                responseBody: $response->body,
                code: $response->status,
            );
        }

        return self::from($content);
    }
}
