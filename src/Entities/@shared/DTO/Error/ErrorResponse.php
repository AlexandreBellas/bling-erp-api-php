<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Error;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Objeto representativo da resposta da requisição com erro.
 */
readonly final class ErrorResponse extends BaseResponseRootObject
{
  /**
   * Constrói o objeto.
   *
   * @param Error $error
   */
  public function __construct(public Error $error)
  {
  }

  /**
   * @inheritDoc
   */
  public static function fromResponse(ResponseOptions $response): static
  {
    return self::from($response->body->content);
  }
}
