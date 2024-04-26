<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Contatos;

use AleBatistella\BlingErpApi\Entities\Contatos\Contatos;
use AleBatistella\BlingErpApi\Entities\Contatos\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\Contatos\Schema\DeleteMany\DeleteManyParams;
use AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindFinalCustomer\FindFinalCustomerResponse;
use AleBatistella\BlingErpApi\Entities\Contatos\Schema\FindTypes\FindTypesResponse;
use AleBatistella\BlingErpApi\Entities\Contatos\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Contatos`.
 */
class ContatosTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return Contatos
     */
    private function getInstance(IBlingRepository $repository): Contatos
    {
        return new Contatos($repository);
    }

    /**
     * Testa a deleção múltipla.
     *
     * @return void
     */
    public function testShouldDeleteManySuccessfully(): void
    {
        $deleteManyResponse = json_decode(file_get_contents(__DIR__ . '/delete-many/response.json'), true);
        $idContato = fake()->randomNumber();
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos"
                        && count($requestOptions->queryParams->content['idsContatos']) === 1
                        && $requestOptions->queryParams->content['idsContatos'][0] === $idContato
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteManyResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->deleteMany(
            new DeleteManyParams(
                idsContatos: [$idContato]
            )
        );

        $this->assertNull($response);
    }

    /**
     * Testa a deleção.
     *
     * @return void
     */
    public function testShouldDeleteSuccessfully(): void
    {
        $deleteResponse = json_decode(file_get_contents(__DIR__ . '/delete/response.json'), true);
        $idContato = fake()->randomNumber();
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('destroy')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos/$idContato"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($deleteResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->delete($idContato);

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
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos"
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
        $idContato = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos/$idContato"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idContato);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa a busca de tipos.
     *
     * @return void
     */
    public function testShouldFindTypesSuccessfully(): void
    {
        $idContato = fake()->randomNumber();
        $findTypesResponse = json_decode(file_get_contents(__DIR__ . '/find-types/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos/$idContato/tipos"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findTypesResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->findTypes($idContato);

        $this->assertInstanceOf(FindTypesResponse::class, $response);
        $this->assertEquals($findTypesResponse, $response->toArray());
    }

    /**
     * Testa a busca de tipos.
     *
     * @return void
     */
    public function testShouldFindFinalCustomerSuccessfully(): void
    {
        $findFinalCustomerResponse = json_decode(
            file_get_contents(__DIR__ . '/find-final-customer/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos/consumidor-final"
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($findFinalCustomerResponse)
            ));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->findFinalCustomer();

        $this->assertInstanceOf(FindFinalCustomerResponse::class, $response);
        $this->assertEquals($findFinalCustomerResponse, $response->toArray());
    }

    /**
     * Testa alterar a situação.
     *
     * @return void
     */
    public function testShouldChangeSituationSuccessfully(): void
    {
        $idContato = fake()->randomNumber();
        $changeSituationBody = json_decode(
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
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos/$idContato/situacoes"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeSituationResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituation(
            idContato: $idContato,
            body: $changeSituationBody
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
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($createResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->create($createBody);

        $this->assertInstanceOf(CreateResponse::class, $response);
        $this->assertEquals($createResponse, $response->toArray());
    }

    /**
     * Testa a alteração de situação múltipla.
     *
     * @return void
     */
    public function testShouldChangeSituationManySuccessfully(): void
    {
        $changeSituationManyBody = json_decode(
            file_get_contents(__DIR__ . '/change-situation-many/request.json'),
            true
        );
        $changeSituationManyResponse = json_decode(
            file_get_contents(__DIR__ . '/change-situation-many/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos/situacoes"
                )
            )
            ->willReturn(
                $this->buildResponse(
                    status: 200,
                    body: $this->buildBody($changeSituationManyResponse)
                )
            );

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeSituationMany($changeSituationManyBody);

        $this->assertNull($response);
    }

    /**
     * Testa a atualização.
     *
     * @return void
     */
    public function testShouldUpdateSuccessfully(): void
    {
        $idContato = fake()->randomNumber();
        $updateBody = json_decode(file_get_contents(__DIR__ . '/update/request.json'), true);
        $updateResponse = json_decode(file_get_contents(__DIR__ . '/update/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('replace')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "contatos/$idContato"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($updateResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->update($idContato, $updateBody);

        $this->assertNull($response);
    }
}
