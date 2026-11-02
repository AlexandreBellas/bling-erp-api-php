<?php

namespace AleBatistella\BlingErpApi\Repositories;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Body;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Headers;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use GuzzleHttp\Client;

/**
 * Repositório de chamada de API do Bling utilizando `GuzzleHttp`.
 */
class BlingRepository implements IBlingRepository
{
    /** @property Client $client Cliente de chamada HTTP. */
    private readonly Client $client;

    /** @property array $baseHeaders _Headers_ base para a requisição. */
    private readonly array $baseHeaders;

    /**
     * Cria o objeto.
     *
     * @param string $baseUrl
     * @param string $accessToken
     */
    public function __construct(string $baseUrl, string $accessToken)
    {
        $this->baseHeaders = ["Authorization" => "Bearer $accessToken"];
        $this->client = new Client(["base_uri" => $baseUrl, "http_errors" => false]);
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions $options
     * @inheritDoc
     */
    public function index(RequestOptions $options): ResponseOptions
    {
        $response = $this->client->get($options->endpoint, [
          "query"   => $options->queryParams?->content,
          "headers" => [
            ...$this->baseHeaders,
            ...($options->headers?->content ?? [])
          ],
        ]);

        return new ResponseOptions(
            endpoint: $options->endpoint,
            method: "GET",
            status: $response->getStatusCode(),
            headers: new Headers($response->getHeaders()),
            body: $this->buildResponseBody($response->getBody()->getContents(), $response->getStatusCode()),
        );
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions $options
     * @inheritDoc
     */
    public function show(RequestOptions $options): ResponseOptions
    {
        return $this->index($options);
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions $options
     * @inheritDoc
     */
    public function store(RequestOptions $options): ResponseOptions
    {
        $response = $this->client->post($options->endpoint, [
          "query"   => $options->queryParams?->content,
          "json"    => $options->body?->content,
          "headers" => [
            ...$this->baseHeaders,
            ...($options->headers?->content ?? [])
          ],
        ]);

        return new ResponseOptions(
            endpoint: $options->endpoint,
            method: "POST",
            status: $response->getStatusCode(),
            headers: new Headers($response->getHeaders()),
            body: $this->buildResponseBody($response->getBody()->getContents(), $response->getStatusCode()),
        );
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions $options
     * @inheritDoc
     */
    public function update(RequestOptions $options): ResponseOptions
    {
        $response = $this->client->patch($options->endpoint, [
          "query"   => $options->queryParams?->content,
          "json"    => $options->body?->content,
          "headers" => [
            ...$this->baseHeaders,
            ...($options->headers?->content ?? [])
          ],
        ]);

        return new ResponseOptions(
            endpoint: $options->endpoint,
            method: "PATCH",
            status: $response->getStatusCode(),
            headers: new Headers($response->getHeaders()),
            body: $this->buildResponseBody($response->getBody()->getContents(), $response->getStatusCode()),
        );
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions $options
     * @inheritDoc
     */
    public function replace(RequestOptions $options): ResponseOptions
    {
        $response = $this->client->put($options->endpoint, [
          "query"   => $options->queryParams?->content,
          "json"    => $options->body?->content,
          "headers" => [
            ...$this->baseHeaders,
            ...($options->headers?->content ?? [])
          ],
        ]);

        return new ResponseOptions(
            endpoint: $options->endpoint,
            method: "PUT",
            status: $response->getStatusCode(),
            headers: new Headers($response->getHeaders()),
            body: $this->buildResponseBody($response->getBody()->getContents(), $response->getStatusCode()),
        );
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions $options
     * @inheritDoc
     */
    public function destroy(RequestOptions $options): ResponseOptions
    {
        $response = $this->client->delete($options->endpoint, [
          "query"   => $options->queryParams?->content,
          "json"    => $options->body?->content,
          "headers" => [
            ...$this->baseHeaders,
            ...($options->headers?->content ?? [])
          ],
        ]);

        return new ResponseOptions(
            endpoint: $options->endpoint,
            method: "DELETE",
            status: $response->getStatusCode(),
            headers: new Headers($response->getHeaders()),
            body: $this->buildResponseBody($response->getBody()->getContents(), $response->getStatusCode()),
        );
    }

    /**
     * Monta o corpo da resposta.
     *
     * Um corpo que não é JSON vira texto só em status de erro. Em 2xx ele
     * permanece vazio para `fromResponse` lançar `BlingInternalException`.
     *
     * @param mixed $contents
     * @param int $status
     *
     * @return ?Body
     */
    private function buildResponseBody(mixed $contents, int $status): ?Body
    {
        if (!is_string($contents) || $contents === "") {
            return null;
        }

        $decoded = json_decode($contents, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return is_array($decoded) ? new Body($decoded) : null;
        }

        if ($status >= 400) {
            return new Body($contents);
        }

        return null;
    }
}
