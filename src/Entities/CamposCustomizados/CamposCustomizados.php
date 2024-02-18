<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados;

use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\FindByModule\FindByModuleParams;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\FindByModule\FindByModuleResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetModules\GetModulesResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetTypes\GetTypesResponse;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com campos customizados.
 *
 * @see https://developer.bling.com.br/referencia#/Campos%20Customizados
 */
class CamposCustomizados extends BaseEntity
{
    /**
     * Remove um campo customizado.
     *
     * @param int $idCampoCustomizado ID para deleção.
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/delete_campos_customizados__idCampoCustomizado_
     */
    public function delete(int $idCampoCustomizado): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "campos-customizados/$idCampoCustomizado"
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém módulos que possuem campos customizados.
     *
     * @return GetModulesResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/get_campos_customizados_modulos
     */
    public function getModules(): GetModulesResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "campos-customizados/modulos"
            )
        );

        return GetModulesResponse::fromResponse($response);
    }

    /**
     * Obtém tipos de campos customizados.
     * 
     * @return GetTypesResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/get_campos_customizados_tipos
     */
    public function getTypes(): GetTypesResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "campos-customizados/tipos"
            )
        );

        return GetTypesResponse::fromResponse($response);
    }

    /**
     * Obtém campos customizados por módulo.
     * 
     * @param int $idModulo ID do módulo.
     * @param FindByModuleParams|array|null $params Parâmetros da busca.
     * 
     * @return FindByModuleResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/get_campos_customizados_modulos__idModulo_
     */
    public function findByModule(
        int $idModulo,
        FindByModuleParams|array|null $params = null
    ): FindByModuleResponse {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "campos-customizados/modulos/$idModulo",
                queryParams: $params
            )
        );

        return FindByModuleResponse::fromResponse($response);
    }

    /**
     * Obtém um campo customizado.
     * 
     * @param int $idCampoCustomizado ID do campo customizado.
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/get_campos_customizados__idCampoCustomizado_
     */
    public function find(int $idCampoCustomizado): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "campos-customizados/$idCampoCustomizado",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Altera a situação de um campo customizado.
     * 
     * @param int $idCampoCustomizado ID do campo customizado.
     * @param array $body Corpo da requisição.
     * 
     * @return null
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/patch_campos_customizados__idCampoCustomizado__situacoes
     */
    public function changeSituation(int $idCampoCustomizado, array $body): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "campos-customizados/$idCampoCustomizado/situacoes",
                body: $body
            )
        );

        return ChangeSituationResponse::fromResponse($response);
    }

    /**
     * Cria um campo customizado.
     * 
     * @param array $body Corpo da requisição.
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/post_campos_customizados
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "campos-customizados",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um campo customizado.
     * 
     * @param int $idCampoCustomizado O ID do campo customizado.
     * @param array $body Corpo da requisição.
     * 
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Campos%20Customizados/put_campos_customizados__idCampoCustomizado_
     */
    public function update(int $idCampoCustomizado, array $body): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "campos-customizados/$idCampoCustomizado",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
