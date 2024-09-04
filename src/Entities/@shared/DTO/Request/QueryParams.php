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
   * @param array<string, string|string[]|int|int[]|\DateTimeInterface> $content
   */
  public function __construct(public array $content) {}

  /**
   * Prepara um parâmetro de data para chamada do repositório.
   *
   * @param \DateTimeInterface|string|null $param Parâmetro do tipo `string`, `\DateTimeInterface` ou `null`
   * @param bool $shouldIncludeTime Define se a `string` de retorno deve incluir horas caso `$param` seja do tipo `\DateTimeInterface`
   *
   * @return string|null
   */
  protected function prepareStringOrDateParam(
    \DateTimeInterface|string|null $param,
    bool $shouldIncludeTime = false
  ): string|null {
    if (is_null($param)) {
      return null;
    }

    if (gettype($param) === 'string') {
      return $param;
    }

    if (!$shouldIncludeTime) {
      return convertDateToString($param);
    }

    return convertDateTimeToString($param);
  }
}
