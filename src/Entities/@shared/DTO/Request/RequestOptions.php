<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Request;

/**
 * Dados para envio de uma requisição.
 */
class RequestOptions
{
  public ?QueryParams $queryParams;
  public ?Body $body;
  public ?Headers $headers;

  /**
   * Constrói o objeto.
   *
   * @param string $endpoint
   * @param QueryParams|array|null $queryParams
   * @param Headers|array|null $headers
   * @param Body|array|string|null $body
   */
  public function __construct(
    public string $endpoint,
    QueryParams|array|null $queryParams = null,
    Headers|array|null $headers = null,
    Body|array|string|null $body = null,
  ) {
    $this->queryParams = is_array($queryParams) ? new QueryParams($queryParams) : $queryParams;
    $this->headers = is_array($headers) ? new Headers($headers) : $headers;
    $this->body = in_array(gettype($body), ['string', 'array']) ? new Body($body) : $body;
  }
}
