<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas;

use AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\LogisticasEtiquetas;
use AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `LogisticasEtiquetas`.
 */
class LogisticasEtiquetasTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return LogisticasEtiquetas
     */
    private function getInstance(IBlingRepository $repository): LogisticasEtiquetas
    {
        return new LogisticasEtiquetas($repository);
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
                    $requestOptions->endpoint === "logisticas/etiquetas"
                        && is_null($requestOptions->queryParams)
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($getResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->get();

        $this->assertInstanceOf(GetResponse::class, $response);
        $this->assertEquals($getResponse, $response->toArray());
    }
}
