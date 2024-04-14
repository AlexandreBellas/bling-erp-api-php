<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Shared\DTO\Request;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\Body;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestStatus\Notice;
use PHPUnit\Framework\TestStatus\Warning;

/**
 * Teste de `ResponseOptions`.
 */
class ResponseOptionsTest extends TestCase
{
  /**
   * Testa a instanciação para _status_ HTTP bem sucedido.
   *
   * @return void
   */
  public function testShouldInstantiateWithNormalConditions(): void
  {
    $expected = ResponseOptions::class;

    $actual = new ResponseOptions(
      endpoint: fake()->word(),
      method: fake()->word(),
      status: 200
    );

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa o lançamento de erro para requisição mal-sucedida e corpo esperado.
   *
   * @return void
   */
  public function testShouldInstantiateWithErrorAndExpectedBody(): void
  {
    $this->expectException(BlingApiException::class);
    $this->expectExceptionMessage("A venda não pode ser salva, pois ocorreram problemas em sua validação.");
    $rawResponse = '{
      "error": {
        "type": "VALIDATION_ERROR",
        "message": "Não foi possível salvar a venda",
        "description": "A venda não pode ser salva, pois ocorreram problemas em sua validação.",
        "fields": [
          {
            "code": 49,
            "msg": "Uma ou mais parcelas da venda possuem erros de validação",
            "element": "parcelas",
            "namespace": "VENDAS",
            "collection": [
              {
                "index": 1,
                "code": 12,
                "msg": "Id da forma de pagamento inválido.",
                "element": "formaPagamento",
                "namespace": "VENDAS"
              }
            ]
          }
        ]
      }
    }';
    $rawResponseArray = json_decode($rawResponse, true);

    new ResponseOptions(
      endpoint: fake()->word(),
      method: fake()->word(),
      status: 400,
      body: new Body($rawResponseArray)
    );
  }

  /**
   * Testa o lançamento de erro para requisição mal-sucedida e corpo inesperado.
   *
   * @return void
   */
  public function testShouldInstantiateWithErrorAndNotExpectedBody(): void
  {
    $endpoint = fake()->word();
    $method = fake()->word();
    $this->expectException(BlingInternalException::class);
    $this->expectExceptionMessage(
      "Could not parse property \"error\" of type \"AleBatistella\\BlingErpApi\\Entities\\Shared\\DTO\\Error\\Error\"."
    );

    new ResponseOptions(
      endpoint: $endpoint,
      method: $method,
      status: 400,
      body: new Body(['teste' => '123'])
    );
  }
}
