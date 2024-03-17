<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes;

use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\NaturezasDeOperacoes;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\CalculateItemTax\CalculateItemTaxResponse;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `NaturezasDeOperacoes`.
 */
class NaturezasDeOperacoesTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return NaturezasDeOperacoes
     */
    private function getInstance(IBlingRepository $repository): NaturezasDeOperacoes
    {
        return new NaturezasDeOperacoes($repository);
    }

    /**
     * Testa a listagem.
     *
     * @return void
     */
    public function testShouldGetSuccessfully(): void
    {
        $getResponse = json_decode(file_get_contents(__DIR__ . '/get/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "naturezas-operacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->get();

        $this->assertInstanceOf(GetResponse::class, $response);
        $this->assertEquals($getResponse, $response->toArray());
    }

    /**
     * Testa o cálculo de imposto.
     *
     * @return void
     */
    public function testShouldCalculateItemTaxSuccessfully(): void
    {
        $idNaturezaOperacao = fake()->randomNumber();
        $calculateItemTaxBody = json_decode(
            file_get_contents(__DIR__ . '/calculate-item-tax/request.json'),
            true
        );
        $calculateItemTaxResponse = json_decode(
            file_get_contents(__DIR__ . '/calculate-item-tax/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "naturezas-operacoes/$idNaturezaOperacao/calcular-imposto-item"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($calculateItemTaxResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->calculateItemTax(
            idNaturezaOperacao: $idNaturezaOperacao,
            body: $calculateItemTaxBody
        );

        $this->assertInstanceOf(CalculateItemTaxResponse::class, $response);
        $this->assertEquals($calculateItemTaxResponse, $response->toArray());
    }
}
