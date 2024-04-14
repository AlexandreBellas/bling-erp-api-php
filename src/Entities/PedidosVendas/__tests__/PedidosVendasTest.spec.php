<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\PedidosVendas;

use AleBatistella\BlingErpApi\Entities\PedidosVendas\PedidosVendas;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\GenerateNfe\GenerateNfeResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\GenerateNfce\GenerateNfceResponse;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `PedidosVendas`.
 */
class PedidosVendasTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return PedidosVendas
     */
    private function getInstance(IBlingRepository $repository): PedidosVendas
    {
        return new PedidosVendas($repository);
    }

    /**
     * Testa a deleção múltipla.
     *
     * @return void
     */
    public function testShouldDeleteManySuccessfully(): void
    {
        $idsPedidosVendas = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . '/delete-many/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas"
                        && $requestOptions->queryParams->content === ['idsPedidosVendas' => $idsPedidosVendas]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->deleteMany(
            idsPedidosVendas: $idsPedidosVendas
        );

        $this->assertInstanceOf(DeleteManyResponse::class, $response);
        $this->assertEquals($deleteManyResponse, $response->toArray());
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete(
            idPedidoVenda: $idPedidoVenda
        );

        $this->assertNull($response);
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
                    $requestOptions->endpoint === "pedidos/vendas"
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
        $idPedidoVenda = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idPedidoVenda);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa a mudança de situação.
     *
     * @return void
     */
    public function testShouldChangeSituationSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $idSituacao = fake()->randomNumber();
        $changeSituationResponse = json_decode(file_get_contents(__DIR__ . '/change-situation/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/situacoes/$idSituacao"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituation(
            idPedidoVenda: $idPedidoVenda,
            idSituacao: $idSituacao
        );

        $this->assertNull($response);
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
                    $requestOptions->endpoint === "pedidos/vendas"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->create($createBody);

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($createResponse, $response->toArray());
    }

    /**
     * Testa o lançamento de estoque para um depósito.
     *
     * @return void
     */
    public function testShouldPostStockToDepositSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $idDeposito = fake()->randomNumber();
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
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/lancar-estoque/$idDeposito"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postStockToDepositResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postStockToDeposit(
            idPedidoVenda: $idPedidoVenda,
            idDeposito: $idDeposito
        );

        $this->assertNull($response);
    }

    /**
     * Testa o lançamento de estoque.
     *
     * @return void
     */
    public function testShouldPostStockSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $postStockResponse = json_decode(file_get_contents(__DIR__ . '/post-stock/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/lancar-estoque"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postStockResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postStock($idPedidoVenda);

        $this->assertNull($response);
    }

    /**
     * Testa o estorno do estoque.
     *
     * @return void
     */
    public function testShouldReverseStockSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $reverseStockResponse = json_decode(file_get_contents(__DIR__ . '/reverse-stock/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/estornar-estoque"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($reverseStockResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->reverseStock($idPedidoVenda);

        $this->assertNull($response);
    }

    /**
     * Testa o lançamento de contas.
     *
     * @return void
     */
    public function testShouldPostAccountsSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $postAccountsResponse = json_decode(file_get_contents(__DIR__ . '/post-accounts/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/lancar-contas"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($postAccountsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->postAccounts($idPedidoVenda);

        $this->assertNull($response);
    }

    /**
     * Testa o estorno de contas.
     *
     * @return void
     */
    public function testShouldReverseAccountsSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $reverseAccountsResponse = json_decode(file_get_contents(__DIR__ . '/reverse-accounts/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/estornar-contas"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($reverseAccountsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->reverseAccounts($idPedidoVenda);

        $this->assertNull($response);
    }

    /**
     * Testa a geração de NF-e.
     *
     * @return void
     */
    public function testShouldGenerateNfeSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $generateNfeResponse = json_decode(file_get_contents(__DIR__ . '/generate-nfe/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/gerar-nfe"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($generateNfeResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->generateNfe($idPedidoVenda);

        $this->assertInstanceOf(GenerateNfeResponse::class, $response);
        $this->assertEquals($generateNfeResponse, $response->toArray());
    }

    /**
     * Testa a geração de NFC-e.
     *
     * @return void
     */
    public function testShouldGenerateNfceSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $generateNfceResponse = json_decode(file_get_contents(__DIR__ . '/generate-nfce/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda/gerar-nfce"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($generateNfceResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->generateNfce($idPedidoVenda);

        $this->assertInstanceOf(GenerateNfceResponse::class, $response);
        $this->assertEquals($generateNfceResponse, $response->toArray());
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idPedidoVenda = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "pedidos/vendas/$idPedidoVenda"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idPedidoVenda, $updateBody);

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($updateResponse, $response->toArray());
    }
}
