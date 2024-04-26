<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Vendedores;

use AleBatistella\BlingErpApi\Entities\Vendedores\Vendedores;
use AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Vendedores`.
 */
class VendedoresTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Vendedores
     */
    private function getInstance(IBlingRepository $repository): Vendedores
    {
        return new Vendedores($repository);
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
                    $requestOptions->endpoint === "vendedores"
                        && is_null($requestOptions->queryParams)
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($getResponse)
            ));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->get();

        $this->assertInstanceOf(GetResponse::class, $response);
        $this->assertEquals($getResponse, $response->toArray());
    }

    /**
     * Testa a busca pontual.
     *
     * @return void
     */
    public function testShouldFindSuccessfully(): void
    {
        $idVendedor = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "vendedores/$idVendedor"
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($findResponse)
            ));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idVendedor);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }
}
