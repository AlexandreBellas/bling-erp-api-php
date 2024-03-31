<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Notificacoes;

use AleBatistella\BlingErpApi\Entities\Notificacoes\Notificacoes;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\GetQuantity\GetQuantityResponse;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Read\ReadResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Notificacoes`.
 */
class NotificacoesTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Notificacoes
     */
    private function getInstance(IBlingRepository $repository): Notificacoes
    {
        return new Notificacoes($repository);
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
                    $requestOptions->endpoint === "notificacoes"
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
     * Testa a busca de quantidade.
     *
     * @return void
     */
    public function testShouldGetQuantitySuccessfully(): void
    {
        $getQuantityResponse = json_decode(file_get_contents(__DIR__ . '/get-quantity/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "notificacoes/quantidade"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getQuantityResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->getQuantity();

        $this->assertInstanceOf(GetQuantityResponse::class, $response);
        $this->assertEquals($getQuantityResponse, $response->toArray());
    }

    /**
     * Testa a criação.
     *
     * @return void
     */
    public function testShouldReadSuccessfully(): void
    {
        $idNotificacao = fake()->randomNumber();
        $readResponse = json_decode(file_get_contents(__DIR__ . '/read/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "notificacoes/$idNotificacao/confirmar-leitura"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($readResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->read($idNotificacao);

        $this->assertInstanceOf(ReadResponse::class, $response);
        $this->assertEquals($readResponse, $response->toArray());
    }
}
