<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\GruposDeProdutos;

use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\GruposDeProdutos;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\DeleteMany\DeleteManyParams;
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `GruposDeProdutos`.
 */
class GruposDeProdutosTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     *
     * @param \AleBatistella\BlingErpApi\Repositories\IBlingRepository $repository
     * @return GruposDeProdutos
     */
    private function getInstance(IBlingRepository $repository): GruposDeProdutos
    {
        return new GruposDeProdutos($repository);
    }

    /**
     * Testa a deleção múltipla com resposta completa.
     *
     * @return void
     */
    public function testShouldDeleteManyWithFullResponseSuccessfully(): void
    {
        $idsGruposProdutos = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . "/delete-many/response-full.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("destroy")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "grupos-produtos"
                        && $requestOptions->queryParams->content === ["idsGruposProdutos" => $idsGruposProdutos]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->deleteMany(
            params: ["idsGruposProdutos" => $idsGruposProdutos]
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
        $idsGruposProdutos = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . "/delete-many/response-empty.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("destroy")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "grupos-produtos"
                        && $requestOptions->queryParams->content === ["idsGruposProdutos" => $idsGruposProdutos]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->deleteMany(
            params: ["idsGruposProdutos" => $idsGruposProdutos]
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
        $params = new DeleteManyParams(idsGruposProdutos: [1, 2]);
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
        $idGrupoProduto = fake()->randomNumber();
        $deleteResponse = json_decode(file_get_contents(__DIR__ . "/delete/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("destroy")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "grupos-produtos/$idGrupoProduto"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->delete(
            idGrupoProduto: $idGrupoProduto
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
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "grupos-produtos"
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
        $idGrupoProduto = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . "/find/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("show")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "grupos-produtos/$idGrupoProduto"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->find($idGrupoProduto);

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
        $createBody = json_decode(file_get_contents(__DIR__ . "/create/request.json"), true);
        $createResponse = json_decode(file_get_contents(__DIR__ . "/create/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("store")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "grupos-produtos"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
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
        $idGrupoProduto = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . "/update/request.json"), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . "/update/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("replace")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "grupos-produtos/$idGrupoProduto"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->update($idGrupoProduto, $updateBody);

        $this->assertNull($response);
    }
}
