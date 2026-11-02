<?php

namespace Tests\Unit\AleBatistella\BlingErpApi\Entities\Usuarios;

use AleBatistella\BlingErpApi\Entities\Usuarios\Usuarios;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Shared\TestResponseTrait;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\RecoverPassword\RecoverPasswordResponse;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ValidateHash\ValidateHashParams;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ValidateHash\ValidateHashResponse;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Usuarios`.
 */
class UsuariosTest extends TestCase
{
    use TestResponseTrait;

    /**
     * Obtém a instância da entidade.
     *
     *
     * @param \AleBatistella\BlingErpApi\Repositories\IBlingRepository $repository
     * @return Usuarios
     */
    private function getInstance(IBlingRepository $repository): Usuarios
    {
        return new Usuarios($repository);
    }

    /**
     * Testa a verificação do _hash_.
     *
     * @return void
     */
    public function testShouldValidateHashSuccessfully(): void
    {
        $hash = fake()->word();
        $validateHashResponse = json_decode(
            file_get_contents(__DIR__ . "/validate-hash/response.json"),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("index")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "usuarios/verificar-hash"
                        && $requestOptions->queryParams->content === ["hash" => $hash]
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($validateHashResponse)
            ));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->validateHash(params: ["hash" => $hash]);

        $this->assertInstanceOf(ValidateHashResponse::class, $response);
        $this->assertEquals($validateHashResponse, $response->toArray());
    }

    /**
     * Testa que o mapa e o objeto de parâmetros enviam a mesma requisição.
     *
     * @return void
     */
    public function testShouldValidateHashWithParamsAndArraySuccessfully(): void
    {
        $params = new ValidateHashParams(hash: "abc");
        $validateHashResponse = json_decode(file_get_contents(__DIR__ . "/validate-hash/response.json"), true);
        $captured = [];
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->exactly(2))
            ->method("index")
            ->willReturnCallback(function (RequestOptions $requestOptions) use (&$captured, $validateHashResponse) {
                $captured[] = $requestOptions;

                return $this->buildResponse(status: 200, body: $this->buildBody($validateHashResponse));
            });

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $entity = $this->getInstance($repository);
        $entity->validateHash(params: $params->content);
        $entity->validateHash(params: $params);

        $this->assertSame($captured[0]->endpoint, $captured[1]->endpoint);
        $this->assertEquals($params->content, $captured[0]->queryParams->content);
        $this->assertEquals($captured[0]->queryParams->content, $captured[1]->queryParams->content);
    }

    /**
     * Testa a mudança de senha.
     *
     * @return void
     */
    public function testShouldChangePasswordSuccessfully(): void
    {
        $password = fake()->word();
        $changePasswordResponse = json_decode(
            file_get_contents(__DIR__ . "/change-password/response.json"),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("update")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "usuarios/redefinir-senha"
                        && $requestOptions->body->content === ["password" => $password]
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($changePasswordResponse)
            ));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->changePassword(["password" => $password]);

        $this->assertNull($response);
    }

    /**
     * Testa o envio de solicitação de mudança de senha.
     *
     * @return void
     */
    public function testShouldRecoverPasswordSuccessfully(): void
    {
        $email = fake()->email();
        $recoverPasswordResponse = json_decode(
            file_get_contents(__DIR__ . "/recover-password/response.json"),
            true
        );
        $repository = $this->getMockBuilder(IBlingRepository::class)->getMock();
        $repository->expects($this->once())
            ->method("store")
            ->with(
                $this->callback(
                    fn (RequestOptions $requestOptions) =>
                    $requestOptions->endpoint === "usuarios/recuperar-senha"
                        && $requestOptions->body->content === ["email" => $email]
                )
            )
            ->willReturn($this->buildResponse(
                status: 200,
                body: $this->buildBody($recoverPasswordResponse)
            ));

        /** @var \AleBatistella\BlingErpApi\Repositories\IBlingRepository&\PHPUnit\Framework\MockObject\MockObject $repository */
        $response = $this->getInstance($repository)->recoverPassword(["email" => $email]);

        $this->assertInstanceOf(RecoverPasswordResponse::class, $response);
        $this->assertEquals($recoverPasswordResponse, $response->toArray());
    }
}
