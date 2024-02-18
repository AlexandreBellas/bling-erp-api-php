<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\CamposCustomizados;

use AleBatistella\BlingErpApi\Entities\CamposCustomizados\CamposCustomizados;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\FindByModule\FindByModuleResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetModules\GetModulesResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetTypes\GetTypesResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `CamposCustomizados`.
 */
class CamposCustomizadosTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return CamposCustomizados
     */
    private function getInstance(IBlingRepository $repository): CamposCustomizados
    {
        return new CamposCustomizados($repository);
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $idCampoCustomizado = fake()->randomNumber();
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "campos-customizados/$idCampoCustomizado"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete($idCampoCustomizado);

        $this->assertNull($response);
    }

    /**
     * Testa a obtenção de módulos.
     *
     * @return void
     */
    public function testShouldGetModulesSuccessfully(): void
    {
        $getModulesResponse = json_decode(file_get_contents(__DIR__ . '/get-modules/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "campos-customizados/modulos"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getModulesResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getModules();

        $this->assertInstanceOf(GetModulesResponse::class, $response);
        $this->assertEquals($getModulesResponse, $response->toArray());
    }

    /**
     * Testa a obtenção de tipos.
     *
     * @return void
     */
    public function testShouldGetTypesSuccessfully(): void
    {
        $getTypesResponse = json_decode(file_get_contents(__DIR__ . '/get-types/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "campos-customizados/tipos"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getTypesResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getTypes();

        $this->assertInstanceOf(GetTypesResponse::class, $response);
        $this->assertEquals($getTypesResponse, $response->toArray());
    }

    /**
     * Testa encontrar por módulo.
     *
     * @return void
     */
    public function testShouldFindByModuleSuccessfully(): void
    {
        $idCampoCustomizado = fake()->randomNumber();
        $findByModuleResponse = json_decode(file_get_contents(__DIR__ . '/find-by-module/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "campos-customizados/modulos/$idCampoCustomizado"
                    && is_null($requestOptions->queryParams)
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findByModuleResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->findByModule($idCampoCustomizado);

        $this->assertInstanceOf(FindByModuleResponse::class, $response);
        $this->assertEquals($findByModuleResponse, $response->toArray());
    }

    /**
     * Testa a busca pontual.
     *
     * @return void
     */
    public function testShouldFindSuccessfully(): void
    {
        $idCampoCustomizado = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "campos-customizados/$idCampoCustomizado"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idCampoCustomizado);

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
        $idCampoCustomizado = fake()->randomNumber();
        $changeSituationRequest = json_decode(file_get_contents(__DIR__ . '/change-situation/request.json'), true);
        $changeSituationResponse = json_decode(file_get_contents(__DIR__ . '/change-situation/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "campos-customizados/$idCampoCustomizado/situacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituation($idCampoCustomizado, $changeSituationRequest);

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
                    $requestOptions->endpoint === "campos-customizados"
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
        $idCampoCustomizado = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "campos-customizados/$idCampoCustomizado"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idCampoCustomizado, $updateBody);

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($updateResponse, $response->toArray());
    }
}
