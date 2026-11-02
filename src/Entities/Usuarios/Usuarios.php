<?php

namespace AleBatistella\BlingErpApi\Entities\Usuarios;

use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ChangePassword\ChangePasswordResponse;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\RecoverPassword\RecoverPasswordResponse;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ValidateHash\ValidateHashParams;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ValidateHash\ValidateHashResponse;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Usuários.
 *
 * @see https://developer.bling.com.br/referencia#/Usu%C3%A1rios
 */
class Usuarios extends BaseEntity
{
    /**
     * Valida o hash recebido.
     *
     * Aceita `ValidateHashParams` ou o mapa de query que o objeto serializa, por exemplo `["hash" => "abc"]`.
     *
     * @param \AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ValidateHash\ValidateHashParams|array $params
     * @return ValidateHashResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Usu%C3%A1rios/get_usuarios_verificar_hash
     */
    public function validateHash(ValidateHashParams|array $params): ValidateHashResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "usuarios/verificar-hash",
                queryParams: $params
            )
        );

        return ValidateHashResponse::fromResponse($response);
    }

    /**
     * Redefine senha do usuário.
     *
     * O corpo segue o cliente JS: `["hash" => $hash, "password" => $password]`.
     *
     * @param array $body
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Usu%C3%A1rios/patch_usuarios_redefinir_senha
     */
    public function changePassword(array $body): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "usuarios/redefinir-senha",
                body: $body
            )
        );

        return ChangePasswordResponse::fromResponse($response);
    }

    /**
     * Envia solicitação de recuperação de senha.
     * 
     *
     * @param array $body
     * @return RecoverPasswordResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Usu%C3%A1rios/post_usuarios_recuperar_senha
     */
    public function recoverPassword(array $body): RecoverPasswordResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "usuarios/recuperar-senha",
                body: $body
            )
        );

        return RecoverPasswordResponse::fromResponse($response);
    }
}
