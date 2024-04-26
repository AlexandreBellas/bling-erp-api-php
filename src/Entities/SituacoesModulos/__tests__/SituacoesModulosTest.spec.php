<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\SituacoesModulos;

use AleBatistella\BlingErpApi\Entities\SituacoesModulos\SituacoesModulos;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModules\GetModulesResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleActions\GetModuleActionsResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleSituations\GetModuleSituationsResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleTransitions\GetModuleTransitionsResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `SituacoesModulos`.
 */
class SituacoesModulosTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return SituacoesModulos
     */
    private function getInstance(IBlingRepository $repository): SituacoesModulos
    {
        return new SituacoesModulos($repository);
    }

    /**
     * Testa a obtenção de módulos.
     *
     * @return void
     */
    public function testShouldGetModulesSuccessfully(): void
    {
        $getModulesResponse = json_decode(
            file_get_contents(__DIR__ . '/get-modules/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "situacoes/modulos"
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($getModulesResponse)
            ));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getModules();

        $this->assertInstanceOf(GetModulesResponse::class, $response);
        $this->assertEquals($getModulesResponse, $response->toArray());
    }

    /**
     * Testa a obtenção de situações de um módulo.
     *
     * @return void
     */
    public function testShouldGetModuleSituationsSuccessfully(): void
    {
        $idModuloSistema = fake()->randomNumber();
        $getModuleSituationsResponse = json_decode(
            file_get_contents(__DIR__ . '/get-module-situations/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "situacoes/modulos/$idModuloSistema"
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($getModuleSituationsResponse)
            ));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getModuleSituations($idModuloSistema);

        $this->assertInstanceOf(GetModuleSituationsResponse::class, $response);
        $this->assertEquals($getModuleSituationsResponse, $response->toArray());
    }

    /**
     * Testa a obtenção de ações de um módulo.
     *
     * @return void
     */
    public function testShouldGetModuleActionsSuccessfully(): void
    {
        $idModuloSistema = fake()->randomNumber();
        $getModuleActionsResponse = json_decode(
            file_get_contents(__DIR__ . '/get-module-actions/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "situacoes/modulos/$idModuloSistema/acoes"
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($getModuleActionsResponse)
            ));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getModuleActions($idModuloSistema);

        $this->assertInstanceOf(GetModuleActionsResponse::class, $response);
        $this->assertEquals($getModuleActionsResponse, $response->toArray());
    }

    /**
     * Testa a obtenção de transições de um módulo.
     *
     * @return void
     */
    public function testShouldGetModuleTransitionsSuccessfully(): void
    {
        $idModuloSistema = fake()->randomNumber();
        $getModuleTransitionsResponse = json_decode(
            file_get_contents(__DIR__ . '/get-module-transitions/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "situacoes/modulos/$idModuloSistema/transicoes"
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($getModuleTransitionsResponse)
            ));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getModuleTransitions($idModuloSistema);

        $this->assertInstanceOf(GetModuleTransitionsResponse::class, $response);
        $this->assertEquals($getModuleTransitionsResponse, $response->toArray());
    }
}
