<?php

namespace AleBatistella\BlingErpApi\Entities\Usuarios;

use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\ChangePassword\ChangePasswordResponse;
use AleBatistella\BlingErpApi\Entities\Usuarios\Schema\RecoverPassword\RecoverPasswordResponse;
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
     * @param string $hash
     *
     * @return ValidateHashResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20M%C3%B3dulos/get_situacoes_modulos
     */
    public function validateHash(string $hash): ValidateHashResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "usuarios/verificar-hash",
                queryParams: ['hash' => $hash]
            )
        );

        return ValidateHashResponse::fromResponse($response);
    }

    /**
     * Redefine senha do usuário.
     * 
     * @param string $password
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Usu%C3%A1rios/patch_usuarios_redefinir_senha
     */
    public function changePassword(string $password): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "usuarios/redefinir-senha",
                body: $password
            )
        );

        return ChangePasswordResponse::fromResponse($response);
    }

    /**
     * Envia solicitação de recuperação de senha.
     * 
     * @param string $email
     *
     * @return RecoverPasswordResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Usu%C3%A1rios/patch_usuarios_redefinir_senha
     */
    public function recoverPassword(string $email): RecoverPasswordResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "usuarios/recuperar-senha",
                body: $email
            )
        );

        return RecoverPasswordResponse::fromResponse($response);
    }
}
