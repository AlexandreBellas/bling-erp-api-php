<?php

namespace AleBatistella\BlingErpApi\Exceptions;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Body;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Headers;

/**
 * Exceção lançada quando há um erro interno na biblioteca.
 */
class BlingInternalException extends \Exception
{
    /**
     * Constrói a exceção.
     *
     * @param string $message
     * @param ?Body $responseBody
     * @param ?Headers $responseHeaders
     * @param int $code
     * @param ?\Throwable $previous
     */
    public function __construct(
        string $message = "",
        public ?Headers $responseHeaders = null,
        public ?Body $responseBody = null,
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
