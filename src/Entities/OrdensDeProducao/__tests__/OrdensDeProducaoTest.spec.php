<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\OrdensDeProducao;

use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\OrdensDeProducao;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand\GenerateOverDemandResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `OrdensDeProducao`.
 */
class OrdensDeProducaoTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return OrdensDeProducao
     */
    private function getInstance(IBlingRepository $repository): OrdensDeProducao
    {
        return new OrdensDeProducao($repository);
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $idOrdemProducao = fake()->randomNumber();
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "ordens-producao/$idOrdemProducao"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete($idOrdemProducao);

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
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "ordens-producao"
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
        $idOrdemProducao = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "ordens-producao/$idOrdemProducao"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idOrdemProducao);

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
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "ordens-producao"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->create($createBody);

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($createResponse, $response->toArray());
    }

    /**
     * Testa a geração sob demanda.
     *
     * @return void
     */
    public function testShouldGenerateOverDemandSuccessfully(): void
    {
        $generateOverDemandResponse = json_decode(
            file_get_contents(__DIR__ . '/generate-over-demand/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "ordens-producao/gerar-sob-demanda"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($generateOverDemandResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->generateOverDemand();

        $this->assertInstanceOf(GenerateOverDemandResponse::class, $response);
        $this->assertEquals($generateOverDemandResponse, $response->toArray());
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idOrdemProducao = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "ordens-producao/$idOrdemProducao"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idOrdemProducao, $updateBody);

        $this->assertNull($response);
    }

    /**
     * Testa a mudança de situação.
     *
     * @return void
     */
    public function testShouldChangeSituationSuccessfully(): void
    {
        $idOrdemProducao = fake()->randomNumber();
        $changeSituationBody = json_decode(file_get_contents(__DIR__ . '/change-situation/request.json'), true);
        $changeSituationResponse = json_decode(file_get_contents(__DIR__ . '/change-situation/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "ordens-producao/$idOrdemProducao/situacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituation($idOrdemProducao, $changeSituationBody);

        $this->assertNull($response);
    }
}
