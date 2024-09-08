<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes;

use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\NaturezasDeOperacoes;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax\ObtainTaxResponse;
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
                    fn(RequestOptions $requestOptions) =>
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
     * Testa a obtenção de regras de imposto.
     *
     * @return void
     */
    public function testShouldObtainTaxSuccessfully(): void
    {
        $idNaturezaOperacao = fake()->randomNumber();
        $calculateItemTaxBody = json_decode(
            file_get_contents(__DIR__ . '/obtain-tax/request.json'),
            true
        );
        $calculateItemTaxResponse = json_decode(
            file_get_contents(__DIR__ . '/obtain-tax/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "naturezas-operacoes/$idNaturezaOperacao/obter-tributacao"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($calculateItemTaxResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->obtainTax(
            idNaturezaOperacao: $idNaturezaOperacao,
            body: $calculateItemTaxBody
        );

        $this->assertInstanceOf(ObtainTaxResponse::class, $response);
        $this->assertEquals($calculateItemTaxResponse, $response->toArray());
    }
}
