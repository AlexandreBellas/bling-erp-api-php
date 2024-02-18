<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Request;

use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Corpo da requisição.
 */
readonly class Body
{
  /**
   * Constrói o objeto.
   *
   * @param array<string, string|int|\DateTimeInterface> $content
   *
   * @return self
   */
  public function __construct(public array $content)
  {
  }
}
