<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Nfes;

use AleBatistella\BlingErpApi\Entities\Nfes\Nfes;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Send\SendResponse;
use AleBatistella\BlingErpApi\Entities\Nfes\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Nfes`.
 */
class NfesTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Nfes
     */
    private function getInstance(IBlingRepository $repository): Nfes
    {
        return new Nfes($repository);
    }

    /**
     * Testa a deleção múltipla.
     *
     * @return void
     */
    public function testShouldDeleteManySuccessfully(): void
    {
        $idsNotas = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . '/delete-many/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe"
                        && !is_null($requestOptions->queryParams)
                        && $requestOptions->queryParams->content === ['idsNotas' => $idsNotas]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->deleteMany(
            idsNotas: $idsNotas
        );

        $this->assertInstanceOf(DeleteManyResponse::class, $response);
        $this->assertEquals($deleteManyResponse, $response->toArray());
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
                    $requestOptions->endpoint === "nfe"
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
        $idNotaFiscal = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe/$idNotaFiscal"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idNotaFiscal);

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
                    $requestOptions->endpoint === "nfe"
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
        $idNotaFiscal = fake()->randomNumber();
        $sendResponse = json_decode(file_get_contents(__DIR__ . '/send/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe/$idNotaFiscal/enviar"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($sendResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->send($idNotaFiscal);

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
        $idNotaFiscal = fake()->randomNumber();
        $postAccountsResponse = json_decode(file_get_contents(__DIR__ . '/post-accounts/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe/$idNotaFiscal/lancar-contas"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postAccountsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postAccounts($idNotaFiscal);

        $this->assertNull($response);
    }

    /**
     * Testa o estorno de contas.
     *
     * @return void
     */
    public function testShouldReverseAccountsSuccessfully(): void
    {
        $idNotaFiscal = fake()->randomNumber();
        $reverseAccountsResponse = json_decode(file_get_contents(__DIR__ . '/reverse-accounts/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe/$idNotaFiscal/estornar-contas"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($reverseAccountsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->reverseAccounts($idNotaFiscal);

        $this->assertNull($response);
    }

    /**
     * Testa o lançamento de estoque.
     *
     * @return void
     */
    public function testShouldPostStockSuccessfully(): void
    {
        $idNotaFiscal = fake()->randomNumber();
        $postStockResponse = json_decode(file_get_contents(__DIR__ . '/post-stock/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe/$idNotaFiscal/lancar-estoque"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postStockResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postStock($idNotaFiscal);

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
        $idNotaFiscal = fake()->randomNumber();
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
                    $requestOptions->endpoint === "nfe/$idNotaFiscal/lancar-estoque/$idDeposito"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postStockToDepositResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postStockToDeposit(
            idNotaFiscal: $idNotaFiscal,
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
        $idNotaFiscal = fake()->randomNumber();
        $reverseStockResponse = json_decode(file_get_contents(__DIR__ . '/reverse-stock/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe/$idNotaFiscal/estornar-estoque"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($reverseStockResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->reverseStock($idNotaFiscal);

        $this->assertNull($response);
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idNotaFiscal = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfe/$idNotaFiscal"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idNotaFiscal, $updateBody);

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($updateResponse, $response->toArray());
    }
}
