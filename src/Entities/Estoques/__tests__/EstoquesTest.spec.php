<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Estoques;

use AleBatistella\BlingErpApi\Entities\Estoques\Estoques;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\FindBalance\FindBalanceResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances\GetBalancesResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Estoques`.
 */
class EstoquesTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Estoques
     */
    private function getInstance(IBlingRepository $repository): Estoques
    {
        return new Estoques($repository);
    }

    /**
     * Testa a busca pontual.
     *
     * @return void
     */
    public function testShouldFindBalanceSuccessfully(): void
    {
        $idDeposito = fake()->randomNumber();
        $idsProdutos = [fake()->randomNumber(), fake()->randomNumber()];
        $findBalanceResponse = json_decode(file_get_contents(__DIR__ . '/find-balance/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "estoques/saldos/$idDeposito"
                    && $requestOptions->queryParams->content['idsProdutos'] === $idsProdutos
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findBalanceResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->findBalance(
            idDeposito: $idDeposito,
            idsProdutos: $idsProdutos,
        );

        $this->assertInstanceOf(FindBalanceResponse::class, $response);
        $this->assertEquals($findBalanceResponse, $response->toArray());
    }

    /**
     * Testa a listagem.
     *
     * @return void
     */
    public function testShouldGetBalancesSuccessfully(): void
    {
        $idsProdutos = [fake()->randomNumber(), fake()->randomNumber()];
        $getBalancesResponse = json_decode(file_get_contents(__DIR__ . '/get-balances/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "estoques/saldos"
                    && $requestOptions->queryParams->content['idsProdutos'] === $idsProdutos
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getBalancesResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getBalances(
            idsProdutos: $idsProdutos
        );

        $this->assertInstanceOf(GetBalancesResponse::class, $response);
        $this->assertEquals($getBalancesResponse, $response->toArray());
    }

    /**
     * Testa a criação.
     *
     * @return void
     */
    public function testShouldCreateSuccessfully(): void
    {
        $createBody = json_decode(file_get_contents(__DIR__ . '/create/request.json'), true);
        $createResponse = json_decode(file_get_contents(__DIR__ . '/create/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "estoques"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->create($createBody);

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($createResponse, $response->toArray());
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idEstoque = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "estoques/$idEstoque"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idEstoque, $updateBody);

        $this->assertNull($response);
    }
}
