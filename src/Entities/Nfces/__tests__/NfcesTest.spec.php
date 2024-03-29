<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Nfces;

use AleBatistella\BlingErpApi\Entities\Nfces\Nfces;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Send\SendResponse;
use AleBatistella\BlingErpApi\Entities\Nfces\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Nfces`.
 */
class NfcesTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Nfces
     */
    private function getInstance(IBlingRepository $repository): Nfces
    {
        return new Nfces($repository);
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
                    $requestOptions->endpoint === "nfce"
                        && is_null($requestOptions->queryParams)
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getResponse)));

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
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idNotaFiscalConsumidor);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
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
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->create($createBody);

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($createResponse, $response->toArray());
    }

    /**
     * Testa o envio.
     *
     * @return void
     */
    public function testShouldSendSuccessfully(): void
    {
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $sendResponse = json_decode(file_get_contents(__DIR__ . '/send/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor/enviar"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($sendResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->send($idNotaFiscalConsumidor);

        $this->assertInstanceOf(SendResponse::class, $response);
        $this->assertEquals($sendResponse, $response->toArray());
    }

    /**
     * Testa o lançamento de contas.
     *
     * @return void
     */
    public function testShouldPostAccountsSuccessfully(): void
    {
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $postAccountsResponse = json_decode(file_get_contents(__DIR__ . '/post-accounts/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor/lancar-contas"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postAccountsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postAccounts($idNotaFiscalConsumidor);

        $this->assertNull($response);
    }

    /**
     * Testa o estorno de contas.
     *
     * @return void
     */
    public function testShouldReverseAccountsSuccessfully(): void
    {
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $reverseAccountsResponse = json_decode(file_get_contents(__DIR__ . '/reverse-accounts/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor/estornar-contas"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($reverseAccountsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->reverseAccounts($idNotaFiscalConsumidor);

        $this->assertNull($response);
    }

    /**
     * Testa o lançamento de estoque.
     *
     * @return void
     */
    public function testShouldPostStockSuccessfully(): void
    {
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $postStockResponse = json_decode(file_get_contents(__DIR__ . '/post-stock/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor/lancar-estoque"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postStockResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postStock($idNotaFiscalConsumidor);

        $this->assertNull($response);
    }

    /**
     * Testa o lançamento de estoque para um depósito.
     *
     * @return void
     */
    public function testShouldPostStockToDepositSuccessfully(): void
    {
        $idDeposito = fake()->randomNumber();
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $postStockToDepositResponse = json_decode(
            file_get_contents(__DIR__ . '/post-stock-to-deposit/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor/lancar-estoque/$idDeposito"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postStockToDepositResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postStockToDeposit(
            idNotaFiscalConsumidor: $idNotaFiscalConsumidor,
            idDeposito: $idDeposito
        );

        $this->assertNull($response);
    }

    /**
     * Testa o estorno do estoque.
     *
     * @return void
     */
    public function testShouldReverseStockSuccessfully(): void
    {
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $reverseStockResponse = json_decode(file_get_contents(__DIR__ . '/reverse-stock/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor/estornar-estoque"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($reverseStockResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->reverseStock($idNotaFiscalConsumidor);

        $this->assertNull($response);
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idNotaFiscalConsumidor = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfce/$idNotaFiscalConsumidor"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idNotaFiscalConsumidor, $updateBody);

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($updateResponse, $response->toArray());
    }
}
