<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\ProdutosEstruturas;

use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\ProdutosEstruturas;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `ProdutosEstruturas`.
 */
class ProdutosEstruturasTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return ProdutosEstruturas
     */
    private function getInstance(IBlingRepository $repository): ProdutosEstruturas
    {
        return new ProdutosEstruturas($repository);
    }

    /**
     * Testa a deleção de componentes.
     *
     * @return void
     */
    public function testShouldDeleteComponentsSuccessfully(): void
    {
        $idProdutoEstrutura = fake()->randomNumber();
        $idsComponentes = [fake()->randomNumber()];
        $deleteComponentsResponse = json_decode(
            file_get_contents(__DIR__ . '/delete-components/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/estruturas/$idProdutoEstrutura/componentes"
                        && $requestOptions->queryParams->content === ['idsComponentes' => $idsComponentes]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteComponentsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->deleteComponents(
            idProdutoEstrutura: $idProdutoEstrutura,
            idsComponentes: $idsComponentes
        );

        $this->assertNull($response);
    }

    /**
     * Testa a deleção com a resposta completa.
     *
     * @return void
     */
    public function testShouldDeleteWithFullResponseSuccessfully(): void
    {
        $idsProdutos = [fake()->randomNumber()];
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response-full.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/estruturas"
                        && $requestOptions->queryParams->content === ['idsProdutos' => $idsProdutos]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete(
            idsProdutos: $idsProdutos
        );

        $this->assertInstanceOf(DeleteResponse::class, $response);
        $this->assertEquals($deleteResponse, $response->toArray());
    }

    /**
     * Testa a deleção com a resposta vazia.
     *
     * @return void
     */
    public function testShouldDeleteWithEmptyResponseSuccessfully(): void
    {
        $idsProdutos = [fake()->randomNumber()];
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response-empty.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/estruturas"
                        && $requestOptions->queryParams->content === ['idsProdutos' => $idsProdutos]
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete(
            idsProdutos: $idsProdutos
        );

        $this->assertInstanceOf(DeleteResponse::class, $response);
        $this->assertEquals(['data' => null], $response->toArray());
    }

    /**
     * Testa a busca pontual.
     *
     * @return void
     */
    public function testShouldFindSuccessfully(): void
    {
        $idProdutoEstrutura = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/estruturas/$idProdutoEstrutura"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idProdutoEstrutura);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa a mudança de componente.
     *
     * @return void
     */
    public function testShouldChangeComponentSuccessfully(): void
    {
        $idProdutoEstrutura = fake()->randomNumber();
        $idComponente = fake()->randomNumber();
        $changeComponentRequest = json_decode(file_get_contents(__DIR__ . '/change-component/request.json'), true);
        $changeComponentResponse = json_decode(file_get_contents(__DIR__ . '/change-component/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/estruturas/$idProdutoEstrutura/componentes/$idComponente"
                        && $requestOptions->body->content === $changeComponentRequest
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeComponentResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeComponent(
            idProdutoEstrutura: $idProdutoEstrutura,
            idComponente: $idComponente,
            body: $changeComponentRequest
        );

        $this->assertNull($response);
    }

    /**
     * Testa a adição de componente.
     *
     * @return void
     */
    public function testShouldAddComponentSuccessfully(): void
    {
        $idProdutoEstrutura = fake()->randomNumber();
        $addComponentBody = json_decode(file_get_contents(__DIR__ . '/add-component/request.json'), true);
        $addComponentResponse = json_decode(file_get_contents(__DIR__ . '/add-component/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/estruturas/$idProdutoEstrutura/componentes"
                        && $requestOptions->body->content === $addComponentBody
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($addComponentResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->addComponent(
            idProdutoEstrutura: $idProdutoEstrutura,
            body: $addComponentBody
        );

        $this->assertNull($response);
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idProdutoEstrutura = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/estruturas/$idProdutoEstrutura"
                        && $requestOptions->body->content === $updateBody
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idProdutoEstrutura, $updateBody);

        $this->assertNull($response);
    }
}
