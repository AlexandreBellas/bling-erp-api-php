<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\ContasReceber;

use AleBatistella\BlingErpApi\Entities\ContasReceber\ContasReceber;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips\GetBankSlipsParams;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Download\DownloadResponse;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips\GetBankSlipsResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `ContasReceber`.
 */
class ContasReceberTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     *
     * @param \AleBatistella\BlingErpApi\Repositories\IBlingRepository $repository
     * @return ContasReceber
     */
    private function getInstance(IBlingRepository $repository): ContasReceber
    {
        return new ContasReceber($repository);
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $deleteResponse = json_decode(file_get_contents(__DIR__ . "/delete/response.json"), true);
        $idContaReceber = fake()->randomNumber();
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("destroy")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contas/receber/$idContaReceber"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->delete($idContaReceber);

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
                    $requestOptions->endpoint === "contas/receber"
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
        $idContaReceber = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . "/find/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("show")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contas/receber/$idContaReceber"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->find($idContaReceber);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa a visualização de boletos.
     *
     * @return void
     */
    public function testShouldGetBankSlipsSuccessfully(): void
    {
        $idContaReceber = fake()->randomNumber();
        $getBankSlipsResponse = json_decode(file_get_contents(__DIR__ . "/get-bank-slips/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("index")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contas/receber/boletos"
                    && $requestOptions->queryParams->content === ["idOrigem" => $idContaReceber]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getBankSlipsResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->getBankSlips(
            params: ["idOrigem" => $idContaReceber]
        );

        $this->assertInstanceOf(GetBankSlipsResponse::class, $response);
        $this->assertEquals($getBankSlipsResponse, $response->toArray());
    }

    /**
     * Testa que o mapa e o objeto de parâmetros enviam a mesma requisição.
     *
     * @return void
     */
    public function testShouldGetBankSlipsWithParamsAndArraySuccessfully(): void
    {
        $params = new GetBankSlipsParams(idOrigem: 1, situacoes: [1, 2]);
        $getBankSlipsResponse = json_decode(file_get_contents(__DIR__ . "/get-bank-slips/response.json"), true);
        $captured = [];
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->exactly(2))
            ->method("index")
            ->willReturnCallback(function (RequestOptions $requestOptions) use (&$captured, $getBankSlipsResponse) {
                $captured[] = $requestOptions;

                return $this->buildResponse(status: 200, body: $this->buildBody($getBankSlipsResponse));
            });

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $entity = $this->getInstance($repository);
        $entity->getBankSlips(params: $params->content);
        $entity->getBankSlips(params: $params);

        $this->assertSame($captured[0]->endpoint, $captured[1]->endpoint);
        $this->assertEquals($params->content, $captured[0]->queryParams->content);
        $this->assertEquals($captured[0]->queryParams->content, $captured[1]->queryParams->content);
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
                    $requestOptions->endpoint === "contas/receber"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->create($createBody);

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($createResponse, $response->toArray());
    }

    /**
     * Testa a criação.
     *
     * @return void
     */
    public function testShouldDownloadSuccessfully(): void
    {
        $idContaReceber = fake()->randomNumber();
        $downloadBody = json_decode(file_get_contents(__DIR__ . "/download/request.json"), true);
        $downloadResponse = json_decode(file_get_contents(__DIR__ . "/download/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("store")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contas/receber/$idContaReceber/baixar"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($downloadResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->download($idContaReceber, $downloadBody);

        $this->assertInstanceOf(DownloadResponse::class, $response);
        $this->assertEquals($downloadResponse, $response->toArray());
    }

    /**
     * Testa o cancelamento de boletos.
     *
     * @return void
     */
    public function testShouldCancelBankSlipsSuccessfully(): void
    {
        $cancelBankSlipsBody = json_decode(file_get_contents(__DIR__ . "/cancel-bank-slips/request.json"), true);
        $cancelBankSlipsResponse = json_decode(file_get_contents(__DIR__ . "/cancel-bank-slips/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("store")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contas/receber/boletos/cancelar"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($cancelBankSlipsResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->cancelBankSlips($cancelBankSlipsBody);

        $this->assertNull($response);
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idContaReceber = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . "/update/request.json"), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . "/update/response.json"), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("replace")
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contas/receber/$idContaReceber"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->update($idContaReceber, $updateBody);

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($updateResponse, $response->toArray());
    }
}
