<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes;

use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\ProdutosVariacoes;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations\GenerateCombinationsResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\ChangeAttributeName\ChangeAttributeNameResponse;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `ProdutosVariacoes`.
 */
class ProdutosVariacoesTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     * @param IBlingRepository $repository
     *
     * @return ProdutosVariacoes
     */
    private function getInstance(IBlingRepository $repository): ProdutosVariacoes
    {
        return new ProdutosVariacoes($repository);
    }

    /**
     * Testa a busca pontual.
     *
     * @return void
     */
    public function testShouldFindSuccessfully(): void
    {
        $idProdutoPai = fake()->randomNumber();
        $findResponse = json_decode(file_get_contents(__DIR__ . '/find/response.json'), true);
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('show')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/variacoes/$idProdutoPai"
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($findResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->find($idProdutoPai);

        $this->assertInstanceOf(FindResponse::class, $response);
        $this->assertEquals($findResponse, $response->toArray());
    }

    /**
     * Testa a mudança de um atributo.
     *
     * @return void
     */
    public function testShouldChangeAttributeNameSuccessfully(): void
    {
        $idProdutoPai = fake()->randomNumber();
        $changeAttributeNameBody = json_decode(
            file_get_contents(__DIR__ . '/change-attribute-name/request.json'),
            true
        );
        $changeAttributeNameResponse = json_decode(
            file_get_contents(__DIR__ . '/change-attribute-name/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('update')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/variacoes/$idProdutoPai/atributos"
                        && $requestOptions->body->content === $changeAttributeNameBody
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($changeAttributeNameResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->changeAttributeName(
            idProdutoPai: $idProdutoPai,
            body: $changeAttributeNameBody
        );

        $this->assertInstanceOf(ChangeAttributeNameResponse::class, $response);
        $this->assertEquals($changeAttributeNameResponse, $response->toArray());
    }

    /**
     * Testa a geração de combinações.
     *
     * @return void
     */
    public function testShouldGenerateCombinationsSuccessfully(): void
    {
        $generateCombinationsBody = json_decode(
            file_get_contents(__DIR__ . '/generate-combinations/request.json'),
            true
        );
        $generateCombinationsResponse = json_decode(
            file_get_contents(__DIR__ . '/generate-combinations/response.json'),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method('store')
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "produtos/variacoes/atributos/gerar-combinacoes"
                        && $requestOptions->body->content === $generateCombinationsBody
                )
            )
            ->willReturn($this->buildResponse(status: 200, body: $this->buildBody($generateCombinationsResponse)));

        /** @var IBlingRepository $repository */
        $response = $this->getInstance($repository)->generateCombinations(
            body: $generateCombinationsBody
        );

        $this->assertInstanceOf(GenerateCombinationsResponse::class, $response);
        $this->assertEquals($generateCombinationsResponse, $response->toArray());
    }
}
