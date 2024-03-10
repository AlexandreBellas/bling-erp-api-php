<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Homologacao;

use AleBatistella\BlingErpApi\Entities\Homologacao\Homologacao;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Homologacao`.
 */
class HomologacaoTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Homologacao
     */
    private function getInstance(IBlingRepository $repository): Homologacao
    {
        return new Homologacao($repository);
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $hash = fake()->word();
        $idProdutoHomologacao = fake()->randomNumber();
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos/$idProdutoHomologacao"
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($deleteResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hash])
                )
            );

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete(
            idProdutoHomologacao: $idProdutoHomologacao,
            hash: fake()->word()
        );

        $this->assertInstanceOf(DeleteResponse::class, $response);
        $this->assertEquals($hash, $response->hash);
    }

    /**
     * Testa a listagem.
     *
     * @return void
     */
    public function testShouldGetSuccessfully(): void
    {
        $hash = fake()->word();
        $getResponse = json_decode(file_get_contents(__DIR__ . '/get/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos"
                    && is_null($requestOptions->queryParams)
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($getResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hash])
                )
            );

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->get();

        $this->assertInstanceOf(GetResponse::class, $response);
        $this->assertEquals($hash, $response->hash);
        ['data' => $data] = $response->toArray();
        $this->assertEquals($getResponse, ['data' => $data]);
    }

    /**
     * Testa a alteração da situação.
     *
     * @return void
     */
    public function testShouldChangeSituationSuccessfully(): void
    {
        $hash = fake()->word();
        $idProdutoHomologacao = fake()->randomNumber();
        $changeSituationRequest = json_decode(
            file_get_contents(__DIR__ . '/change-situation/request.json'),
            true
        );
        $changeSituationResponse = json_decode(
            file_get_contents(__DIR__ . '/change-situation/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos/$idProdutoHomologacao/situacoes"
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($changeSituationResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hash])
                )
            );

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituation(
            idProdutoHomologacao: $idProdutoHomologacao,
            body: $changeSituationRequest,
            hash: fake()->word()
        );

        $this->assertInstanceOf(ChangeSituationResponse::class, $response);
        $this->assertEquals($hash, $response->hash);
        $this->assertNull($changeSituationResponse);
    }

    /**
     * Testa a criação.
     *
     * @return void
     */
    public function testShouldCreateSuccessfully(): void
    {
        $hash = fake()->word();
        $createBody = json_decode(file_get_contents(__DIR__ . '/create/request.json'), true);
        $createResponse = json_decode(file_get_contents(__DIR__ . '/create/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos"
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($createResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hash])
                )
            );

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->create(
            body: $createBody,
            hash: fake()->word()
        );

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($hash, $response->hash);
        ['data' => $data] = $response->toArray();
        $this->assertEquals($createResponse, ['data' => $data]);
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $hash = fake()->word();
        $idProdutoHomologacao = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos/$idProdutoHomologacao"
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($updateResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hash])
                )
            );

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update(
            idProdutoHomologacao: $idProdutoHomologacao,
            body: $updateBody,
            hash: fake()->word()
        );

        $this->assertInstanceOf(UpdateResponse::class, $response);
        $this->assertEquals($hash, $response->hash);
    }

    /**
     * Testa a execução.
     *
     * @return void
     */
    public function testShouldExecuteSuccessfully(): void
    {
        $hashGet = fake()->word();
        $hashPost = fake()->word();
        $hashPatch = fake()->word();
        $hashPut = fake()->word();
        $hashDelete = fake()->word();
        $getResponse = json_decode(file_get_contents(__DIR__ . '/get/response.json'), true);
        $changeSituationRequest = json_decode(file_get_contents(__DIR__ . '/change-situation/request.json'), true);
        $changeSituationResponse = json_decode(file_get_contents(__DIR__ . '/change-situation/response.json'), true);
        $createResponse = json_decode(file_get_contents(__DIR__ . '/create/response.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $idProdutoHomologacao = $createResponse['data']['id'];
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('index')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos"
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($getResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hashGet])
                )
            );
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos"
                    && $requestOptions->body->content === $getResponse
                    && $requestOptions->headers->content['x-bling-homologacao'] === $hashGet
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($createResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hashPost])
                )
            );
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos/$idProdutoHomologacao"
                    && $requestOptions->body->content === [
                        'nome'   => 'Copo',
                        'preco'  => $createResponse['data']['preco'],
                        'codigo' => $createResponse['data']['codigo'],
                    ]
                    && $requestOptions->headers->content['x-bling-homologacao'] === $hashPost
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($updateResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hashPut])
                )
            );
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos/$idProdutoHomologacao/situacoes"
                    && $requestOptions->body->content === $changeSituationRequest
                    && $requestOptions->headers->content['x-bling-homologacao'] === $hashPut
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($changeSituationResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hashPatch])
                )
            );
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn(RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "homologacao/produtos/$idProdutoHomologacao"
                    && $requestOptions->headers->content['x-bling-homologacao'] === $hashPatch
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($deleteResponse),
                    headers: $this->buildHeaders(['x-bling-homologacao' => $hashDelete])
                )
            );

        /** @var IBlingRepository $repository */
        $this->getInstance($repository)->execute();
    }
}
