<?php

namespace AleBatistella\BlingErpApi\Exceptions;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Body;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Headers;

/**
 * Exceção lançada quando há um erro ao processar _array_ para construir um
 * objeto de resposta.
 */
class BlingParseResponsePayloadException extends \Exception
{
    /**
     * Constrói a exceção.
     *
     * @param array $payload
     * @param string $message
     * @param int $code
     * @param ?\Throwable $previous
     */
    public function __construct(
        public array $payload,
        string $message = "Incorrect payload for class instantiation.",
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
