<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\PropostasComerciais;

use AleBatistella\BlingErpApi\Entities\PropostasComerciais\PropostasComerciais;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `PropostasComerciais`.
 */
class PropostasComerciaisTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return PropostasComerciais
     */
    private function getInstance(IBlingRepository $repository): PropostasComerciais
    {
        return new PropostasComerciais($repository);
    }

    /**
     * Testa a deleção múltipla com resposta completa.
     *
     * @return void
     */
    public function testShouldDeleteManyWithFullResponseSuccessfully(): void
    {
        $idsPropostasComerciais = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . '/delete-many/response-full.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais"
                        && $requestOptions->queryParams->content === ['idsPropostasComerciais' => $idsPropostasComerciais]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->deleteMany(
            idsPropostasComerciais: $idsPropostasComerciais
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
        $idsPropostasComerciais = [fake()->randomNumber()];
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . '/delete-many/response-empty.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais"
                        && $requestOptions->queryParams->content === ['idsPropostasComerciais' => $idsPropostasComerciais]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->deleteMany(
            idsPropostasComerciais: $idsPropostasComerciais
        );

        $this->assertInstanceOf(DeleteManyResponse::class, $response);
        $this->assertEquals(['data' => null], $response->toArray());
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $idPropostaComercial = fake()->randomNumber();
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais/$idPropostaComercial"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete(
            idPropostaComercial: $idPropostaComercial
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
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais"
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
        $idPropostaComercial = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais/$idPropostaComercial"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idPropostaComercial);

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
        $idPropostaComercial = fake()->randomNumber();
        $changeSituationRequest = json_decode(file_get_contents(__DIR__ . '/change-situation/request.json'), true);
        $changeSituationResponse = json_decode(file_get_contents(__DIR__ . '/change-situation/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais/$idPropostaComercial/situacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituation(
            idPropostaComercial: $idPropostaComercial,
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
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais"
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
        $idPropostaComercial = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "propostas-comerciais/$idPropostaComercial"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idPropostaComercial, $updateBody);

        $this->assertNull($response);
    }
}
