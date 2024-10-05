<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Nfses;

use AleBatistella\BlingErpApi\Entities\Nfses\Nfses;
use AleBatistella\BlingErpApi\Entities\Nfses\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Nfses\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Nfses\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponse;
use AleBatistella\BlingErpApi\Entities\Nfses\Schema\Send\SendResponse;
use AleBatistella\BlingErpApi\Entities\Nfses\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Nfses`.
 */
class NfsesTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Nfses
     */
    private function getInstance(IBlingRepository $repository): Nfses
    {
        return new Nfses($repository);
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $idNotaServico = fake()->randomNumber();
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfse/$idNotaServico"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete($idNotaServico);

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
                    $requestOptions->endpoint === "nfse"
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
        $idNotaServico = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfse/$idNotaServico"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idNotaServico);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa a obtenção de configurações.
     *
     * @return void
     */
    public function testShouldGetConfigurationsSuccessfully(): void
    {
        $getConfigurationsResponse = json_decode(
            file_get_contents(__DIR__ . '/get-configurations/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfse/configurations"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getConfigurationsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getConfigurations();

        $this->assertInstanceOf(GetConfigurationsResponse::class, $response);
        $this->assertEquals($getConfigurationsResponse, $response->toArray());
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
                    $requestOptions->endpoint === "nfse"
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
        $idNotaServico = fake()->randomNumber();
        $sendResponse = json_decode(file_get_contents(__DIR__ . '/send/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfse/$idNotaServico/enviar"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($sendResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->send($idNotaServico);

        $this->assertInstanceOf(SendResponse::class, $response);
        $this->assertEquals($sendResponse, $response->toArray());
    }

    /**
     * Testa o cancelamento.
     *
     * @return void
     */
    public function testShouldCancelSuccessfully(): void
    {
        $idNotaServico = fake()->randomNumber();
        $cancelRequest = json_decode(file_get_contents(__DIR__ . '/cancel/request.json'), true);
        $cancelResponse = json_decode(file_get_contents(__DIR__ . '/cancel/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfse/$idNotaServico/cancelar"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($cancelResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->cancel(
            $idNotaServico,
            $cancelRequest
        );

        $this->assertNull($response);
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateConfigurationsSuccessfully(): void
    {
        $updateConfigurationsBody = json_decode(
            file_get_contents(__DIR__ . '/update-configurations/request.json'),
            true
        );
        $updateConfigurationsResponse = json_decode(
            file_get_contents(__DIR__ . '/update-configurations/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "nfse/configuracoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateConfigurationsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->updateConfigurations(
            body: $updateConfigurationsBody
        );

        $this->assertNull($response);
    }
}
