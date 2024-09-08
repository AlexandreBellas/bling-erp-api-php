<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais;

use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\DeleteMany\DeleteManyResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\ChangeSituationMany\ChangeSituationManyResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com Propostas Comerciais.
 *
 * @see https://developer.bling.com.br/referencia#/PropostasComerciais
 */
class PropostasComerciais extends BaseEntity
{
    /**
     * Remove múltiplas propostas comerciais.
     *
     * @param int[] $idsPropostasComerciais IDs dos produtos
     *
     * @return DeleteManyResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Propostas%20Comerciais/delete_propostas_comerciais
     */
    public function deleteMany(array $idsPropostasComerciais): DeleteManyResponse
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "propostas-comerciais",
                queryParams: ['idsPropostasComerciais' => $idsPropostasComerciais]
            )
        );

        return DeleteManyResponse::fromResponse($response);
    }

    /**
     * Remove uma proposta comercial.
     *
     * @param int $idPropostaComercial ID da proposta comercial
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Propostas%20Comerciais/delete_propostas_comerciais__idPropostaComercial_
     */
    public function delete(int $idPropostaComercial): null
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "propostas-comerciais/$idPropostaComercial",
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém propostas comerciais.
     *
     * @param GetParams|array|null $params Parâmetros para a busca
     *
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Propostas%20Comerciais/get_propostas_comerciais
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "propostas-comerciais",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma proposta comercial.
     *
     * @param int $idPropostaComercial ID da proposta comercial
     *
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Propostas%20Comerciais/get_propostas_comerciais__idPropostaComercial_
     */
    public function find(int $idPropostaComercial): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "propostas-comerciais/$idPropostaComercial",
            )
        );

        return FindResponse::fromResponse($response);
    }

    /**
     * Altera a situação de uma proposta comercial.
     *
     * @param int $idPropostaComercial ID da proposta comercial
     * @param array $body Corpo da requisição
     *
     * @return null
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Propostas%20Comerciais/patch_propostas_comerciais__idPropostaComercial__situacoes
     */
    public function changeSituation(int $idPropostaComercial, array $body): null
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "propostas-comerciais/$idPropostaComercial/situacoes",
                body: $body
            )
        );

        return ChangeSituationResponse::fromResponse($response);
    }

    /**
     * Cria uma proposta comercial.
     *
     * @param array $body Corpo da requisição
     *
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Propostas%20Comerciais/post_propostas_comerciais
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "propostas-comerciais",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera uma proposta comercial.
     *
     * @param int $idPropostaComercial ID da proposta comercial
     * @param array $body Corpo da requisição
     *
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Propostas%20Comerciais/put_propostas_comerciais__idPropostaComercial_
     */
    public function update(int $idPropostaComercial, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "propostas-comerciais/$idPropostaComercial",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
