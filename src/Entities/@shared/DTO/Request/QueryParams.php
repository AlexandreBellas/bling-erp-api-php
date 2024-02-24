<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Request;

/**
 * Parâmetros da requisição (para inserção como _query parameters_).
 */
readonly class QueryParams
{
  /**
   * Constrói o objeto.
   *
   * @param array<string, string|int|\DateTimeInterface> $content
   */
  public function __construct(public array $content)
  {
  }

  /**
   * Prepara um parâmetro de data para chamada do repositório.
   *
   * @param \DateTimeInterface|string|null $param Parâmetro do tipo `string`, `\DateTimeInterface` ou `null`
   *
   * @return string|null
   */
  protected function prepareStringOrDateParam(\DateTimeInterface|string|null $param): string|null
  {
    if (is_null($param)) {
      return null;
    }

    if (gettype($param) === 'string') {
      return $param;
    }

    return convertDateToString($param);
  }
}
