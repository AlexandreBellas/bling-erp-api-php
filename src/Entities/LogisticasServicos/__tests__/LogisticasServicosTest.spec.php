<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\LogisticasServicos;

use AleBatistella\BlingErpApi\Entities\LogisticasServicos\LogisticasServicos;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `LogisticasServicos`.
 */
class LogisticasServicosTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return LogisticasServicos
     */
    private function getInstance(IBlingRepository $repository): LogisticasServicos
    {
        return new LogisticasServicos($repository);
    }

    /**
     * Testa a deleção.
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
                    $requestOptions->endpoint === "logisticas/servicos"
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
        $idLogisticaServico = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "logisticas/servicos/$idLogisticaServico"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idLogisticaServico);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa a mudança de _status_.
     *
     * @return void
     */
    public function testShouldChangeSituationSuccessfully(): void
    {
        $changeSituationRequest = json_decode(
            file_get_contents(__DIR__ . '/change-situation/request.json'),
            true
        );
        $changeSituationResponse = json_decode(
            file_get_contents(__DIR__ . '/change-situation/response.json'),
            true
        );
        $idLogisticaServico = fake()->randomNumber();
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "logisticas/$idLogisticaServico/situacoes"
                        && is_null($requestOptions->queryParams)
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituation(
            idLogisticaServico: $idLogisticaServico,
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
        $createBody = json_decode(file_get_contents(__DIR__ . '/create/request.json'), true);
        $createResponse = json_decode(file_get_contents(__DIR__ . '/create/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "logisticas/servicos"
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
        $idLogisticaServico = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "logisticas/servicos/$idLogisticaServico"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idLogisticaServico, $updateBody);

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($updateResponse, $response->toArray());
    }
}
