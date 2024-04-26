<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesModulos;

use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModules\GetModulesResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleActions\GetModuleActionsResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleSituations\GetModuleSituationsResponse;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleTransitions\GetModuleTransitionsResponse;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Situações - Módulos.
 *
 * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20M%C3%B3dulos
 */
class SituacoesModulos extends BaseEntity
{
    /**
     * Obtém módulos.
     *
     * @return GetModulesResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20M%C3%B3dulos/get_situacoes_modulos
     */
    public function getModules(): GetModulesResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "situacoes/modulos",
            )
        );

        return GetModulesResponse::fromResponse($response);
    }

    /**
     * Obtém situações de um módulo.
     * 
     * @param int $idModuloSistema
     *
     * @return GetModuleSituationsResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20M%C3%B3dulos/get_situacoes_modulos__idModuloSistema_
     */
    public function getModuleSituations(int $idModuloSistema): GetModuleSituationsResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "situacoes/modulos/$idModuloSistema",
            )
        );

        return GetModuleSituationsResponse::fromResponse($response);
    }

    /**
     * Obtém as ações de um módulo.
     * 
     * @param int $idModuloSistema
     *
     * @return GetModuleActionsResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20M%C3%B3dulos/get_situacoes_modulos__idModuloSistema_
     */
    public function getModuleActions(int $idModuloSistema): GetModuleActionsResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "situacoes/modulos/$idModuloSistema/acoes",
            )
        );

        return GetModuleActionsResponse::fromResponse($response);
    }

    /**
     * Obtém as transições de um módulo.
     * 
     * @param int $idModuloSistema
     *
     * @return GetModuleTransitionsResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Situa%C3%A7%C3%B5es%20-%20M%C3%B3dulos/get_situacoes_modulos__idModuloSistema_
     */
    public function getModuleTransitions(int $idModuloSistema): GetModuleTransitionsResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "situacoes/modulos/$idModuloSistema/transicoes",
            )
        );

        return GetModuleTransitionsResponse::fromResponse($response);
    }
}
