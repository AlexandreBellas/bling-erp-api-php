<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Shared\DTO\Error;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\ErrorResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Body;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use AleBatistella\BlingErpApi\Repositories\BlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `ErrorResponse`.
 */
class ErrorResponseTest extends TestCase
{
    /**
     * Testa a instanciação com dados esperados.
     *
     * @return void
     */
    public function testShouldInstantiateWithCorrectContent(): void
    {
        $expected = ErrorResponse::class;
        $rawResponse = "{
      \"error\": {
        \"type\": \"VALIDATION_ERROR\",
        \"message\": \"Não foi possível salvar a venda\",
        \"description\": \"A venda não pode ser salva, pois ocorreram problemas em sua validação.\",
        \"fields\": [
          {
            \"code\": 49,
            \"msg\": \"Uma ou mais parcelas da venda possuem erros de validação\",
            \"element\": \"parcelas\",
            \"namespace\": \"VENDAS\",
            \"collection\": [
              {
                \"index\": 1,
                \"code\": 12,
                \"msg\": \"Id da forma de pagamento inválido.\",
                \"element\": \"formaPagamento\",
                \"namespace\": \"VENDAS\"
              }
            ]
          }
        ]
      }
    }";
        $rawResponseArray = json_decode($rawResponse, true);

        $actual = ErrorResponse::from($rawResponseArray);

        $this->assertInstanceOf($expected, $actual);
    }

    /**
     * Testa a instanciação a partir de um `ResponseOptions`.
     *
     * @return void
     */
    public function testShouldInstantiateFromResponseOptions(): void
    {
        $this->expectException(BlingApiException::class);
        $this->expectExceptionMessage(
            "A venda não pode ser salva, pois ocorreram problemas em sua validação."
        );
        $rawResponse = "{
      \"error\": {
        \"type\": \"VALIDATION_ERROR\",
        \"message\": \"Não foi possível salvar a venda\",
        \"description\": \"A venda não pode ser salva, pois ocorreram problemas em sua validação.\",
        \"fields\": [
          {
            \"code\": 49,
            \"msg\": \"Uma ou mais parcelas da venda possuem erros de validação\",
            \"element\": \"parcelas\",
            \"namespace\": \"VENDAS\",
            \"collection\": [
              {
                \"index\": 1,
                \"code\": 12,
                \"msg\": \"Id da forma de pagamento inválido.\",
                \"element\": \"formaPagamento\",
                \"namespace\": \"VENDAS\"
              }
            ]
          }
        ]
      }
    }";
        $rawResponseArray = json_decode($rawResponse, true);
        new ResponseOptions(
            endpoint: fake()->word(),
            method: fake()->word(),
            status: 200,
            body: new Body($rawResponseArray),
        );
    }

    /**
     * Testa a formatação em _array_.
     *
     * @return void
     */
    public function testShouldConvertToArray(): void
    {
        $rawExpected = "{
      \"error\": {
        \"type\": \"VALIDATION_ERROR\",
        \"message\": \"Não foi possível salvar a venda\",
        \"description\": \"A venda não pode ser salva, pois ocorreram problemas em sua validação.\",
        \"fields\": [
          {
            \"code\": 49,
            \"msg\": \"Uma ou mais parcelas da venda possuem erros de validação\",
            \"element\": \"parcelas\",
            \"namespace\": \"VENDAS\",
            \"collection\": [
              {
                \"index\": 1,
                \"code\": 12,
                \"msg\": \"Id da forma de pagamento inválido.\",
                \"element\": \"formaPagamento\",
                \"namespace\": \"VENDAS\"
              }
            ]
          }
        ]
      }
    }";
        $expected = json_decode($rawExpected, true);

        $actual = ErrorResponse::from($expected);

        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * Testa erro sem JSON e erro com corpo HTML.
     *
     * @return void
     */
    public function testShouldThrowInternalExceptionWhenErrorBodyIsMissingOrNotJson(): void
    {
        $html = "<html>502 Bad Gateway</html>";

        try {
            new ResponseOptions(
                endpoint: "produtos",
                method: "GET",
                status: 502,
            );
            $this->fail("Expected BlingInternalException.");
        } catch (BlingInternalException $exception) {
            $this->assertSame(502, $exception->getCode());
            $this->assertNull($exception->responseBody);
        }

        try {
            new ResponseOptions(
                endpoint: "produtos",
                method: "GET",
                status: 502,
                body: new Body($html),
            );
            $this->fail("Expected BlingInternalException.");
        } catch (BlingInternalException $exception) {
            $this->assertSame(502, $exception->getCode());
            $this->assertSame($html, $exception->responseBody?->content);
        }
    }

    /**
     * Testa que o repositório preserva um corpo que não é JSON.
     *
     * @return void
     */
    public function testShouldKeepRawBodyWhenResponseIsNotJson(): void
    {
        $repository = new BlingRepository("https://example.test", "token");
        $method = new \ReflectionMethod(BlingRepository::class, "buildResponseBody");
        $html = "<html>502 Bad Gateway</html>";

        $raw = $method->invoke($repository, $html);
        $empty = $method->invoke($repository, "");
        $json = $method->invoke($repository, "{\"data\":[]}");

        $this->assertInstanceOf(Body::class, $raw);
        $this->assertSame($html, $raw->content);
        $this->assertNull($empty);
        $this->assertInstanceOf(Body::class, $json);
        $this->assertSame(["data" => []], $json->content);
    }
}
