<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Produtos;

use AleBatistella\BlingErpApi\Entities\Produtos\Produtos;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\ChangeSituationMany\ChangeSituationManyResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\DeleteMany\DeleteManyParams;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\Produtos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use AleBatistella\BlingErpApi\Repositories\BlingRepository;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Produtos`.
 */
class ProdutosTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     *
     * @param \AleBatistella\BlingErpApi\Repositories\IBlingRepository $repository
     * @return Produtos
     */
    private function getInstance(IBlingRepository $repository): Produtos
    {
        return new Produtos($repository);
    }

    /**
     * Testa a deleção múltipla com resposta completa.
     *
     * @return void
     */
    public function testShouldDeleteManyWithFullResponseSuccessfully(): void
    {
        $idsProdutos = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . "/delete-many/response-full.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("destroy")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos"
                        && $requestOptions->queryParams->content === ["idsProdutos" => $idsProdutos]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->deleteMany(
            params: ["idsProdutos" => $idsProdutos]
        );

        $this->assertInstanceOf(DeleteManyResponse::class, $response);
        $this->assertEquals($deleteManyResponse, $response->toArray());
    }

    /**
     * Testa a deleção múltipla com resposta vazia.
     *
     * @return void
     */
    public function testShouldDeleteManyWithEmptyResponseSuccessfully(): void
    {
        $idsProdutos = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . "/delete-many/response-empty.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("destroy")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos"
                        && $requestOptions->queryParams->content === ["idsProdutos" => $idsProdutos]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->deleteMany(
            params: ["idsProdutos" => $idsProdutos]
        );

        $this->assertInstanceOf(DeleteManyResponse::class, $response);
        $this->assertEquals(["data" => null], $response->toArray());
    }

    /**
     * Testa que o mapa e o objeto de parâmetros enviam a mesma requisição.
     *
     * @return void
     */
    public function testShouldDeleteManyWithParamsAndArraySuccessfully(): void
    {
        $params = new DeleteManyParams(idsProdutos: [1, 2]);
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . "/delete-many/response-empty.json"), true);
        $captured = [];
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->exactly(2))
            ->method("destroy")
            ->willReturnCallback(function (RequestOptions $requestOptions) use (&$captured, $deleteManyResponse) {
                $captured[] = $requestOptions;

                return $this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse));
            });

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $entity = $this->getInstance($repository);
        $entity->deleteMany(params: $params->content);
        $entity->deleteMany(params: $params);

        $this->assertSame($captured[0]->endpoint, $captured[1]->endpoint);
        $this->assertEquals($params->content, $captured[0]->queryParams->content);
        $this->assertEquals($captured[0]->queryParams->content, $captured[1]->queryParams->content);
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $idProduto = fake()->randomNumber();
        $deleteResponse = json_decode(file_get_contents(__DIR__ . "/delete/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("destroy")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/$idProduto"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->delete(
            idProduto: $idProduto
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
        $getResponse = json_decode(file_get_contents(__DIR__ . "/get/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("index")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos"
                        && is_null($requestOptions->queryParams)
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
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
        $idProduto = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . "/find/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("show")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/$idProduto"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->find($idProduto);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa que um 2xx com corpo que não é JSON lança `BlingInternalException`.
     *
     * @return void
     */
    public function testShouldThrowWhenFindBodyIsNotJsonSuccessfully(): void
    {
        $repository = new BlingRepository("https://example.test", "token");
        $method = new \ReflectionMethod(BlingRepository::class, "buildResponseBody");
        $body = $method->invoke($repository, "<html>not json</html>", 200);

        $this->assertNull($body);
        $this->expectException(BlingInternalException::class);
        $this->expectExceptionMessage("Resposta inconsistente");

        FindResponse::fromResponse($this->buildResponse(
            endpoint: "produtos/1",
            method: "GET",
            status: 200,
            body: $body
        ));
    }

    /**
     * Testa a mudança de situação.
     *
     * @return void
     */
    public function testShouldChangeSituationSuccessfully(): void
    {
        $idProduto = fake()->randomNumber();
        $changeSituationRequest = json_decode(file_get_contents(__DIR__ . "/change-situation/request.json"), true);
        $changeSituationResponse = json_decode(file_get_contents(__DIR__ . "/change-situation/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("update")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/$idProduto/situacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->changeSituation(
            idProduto: $idProduto,
            body: $changeSituationRequest
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
        $createBody = json_decode(file_get_contents(__DIR__ . "/create/request.json"), true);
        $createResponse = json_decode(file_get_contents(__DIR__ . "/create/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("store")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->create($createBody);

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($createResponse, $response->toArray());
    }

    /**
     * Testa a mudança de situação múltipla com resposta completa.
     *
     * @return void
     */
    public function testShouldChangeSituationManyWithFullResponseSuccessfully(): void
    {
        $changeSituationManyRequest = json_decode(file_get_contents(__DIR__ . "/change-situation-many/request.json"), true);
        $changeSituationManyResponse = json_decode(file_get_contents(__DIR__ . "/change-situation-many/response-full.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("store")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/situacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationManyResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->changeSituationMany(
            body: $changeSituationManyRequest
        );

        $this->assertInstanceOf(ChangeSituationManyResponse::class, $response);
        $this->assertEquals($changeSituationManyResponse, $response->toArray());
    }

    /**
     * Testa a mudança de situação múltipla com resposta vazia.
     *
     * @return void
     */
    public function testShouldChangeSituationManyWithEmptyResponseSuccessfully(): void
    {
        $changeSituationManyRequest = json_decode(file_get_contents(__DIR__ . "/change-situation-many/request.json"), true);
        $changeSituationManyResponse = json_decode(file_get_contents(__DIR__ . "/change-situation-many/response-empty.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("store")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/situacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationManyResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->changeSituationMany(
            body: $changeSituationManyRequest
        );

        $this->assertInstanceOf(ChangeSituationManyResponse::class, $response);
        $this->assertEquals(["data" => null], $response->toArray());
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idProduto = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . "/update/request.json"), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . "/update/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("replace")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/$idProduto"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->update($idProduto, $updateBody);

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($updateResponse, $response->toArray());
    }
}
