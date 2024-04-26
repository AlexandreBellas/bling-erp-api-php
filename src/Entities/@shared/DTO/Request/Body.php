<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Request;

/**
 * Corpo da requisição.
 */
readonly class Body
{
  /**
   * Constrói o objeto.
   *
   * @param array<string, string|int|\DateTimeInterface>|string $content
   *
   * @return self
   */
  public function __construct(public array|string $content)
  {
  }
}
