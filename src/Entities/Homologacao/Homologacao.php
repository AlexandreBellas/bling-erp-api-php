<?php

namespace AleBatistella\BlingErpApi\Entities\Homologacao;

use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Delete\DeleteResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\ChangeSituation\ChangeSituationResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com homologação.
 *
 * @see https://developer.bling.com.br/referencia#/Homologa%C3%A7%C3%A3o
 */
class Homologacao extends BaseEntity
{
    /**
     * Remove o produto da homologação.
     *
     * @param int $idProdutoHomologacao ID do produto da homologação
     * @param string $hash O hash da requisição anterior
     *
     * @return DeleteResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Homologa%C3%A7%C3%A3o/delete_homologacao_produtos__idProdutoHomologacao_
     */
    public function delete(int $idProdutoHomologacao, string $hash): DeleteResponse
    {
        $response = $this->repository->destroy(
            new RequestOptions(
                endpoint: "homologacao/produtos/$idProdutoHomologacao",
                headers: ["x-bling-homologacao" => $hash]
            )
        );

        return DeleteResponse::fromResponse($response);
    }

    /**
     * Obtém o produto da homologação.
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Homologa%C3%A7%C3%A3o/get_homologacao_produtos
     */
    public function get(): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "homologacao/produtos",
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Altera a situação do produto da homologação.
     * 
     * @param int $idProdutoHomologacao ID do produto da homologação
     * @param array $body Corpo da requisição
     * @param string $hash O hash da requisição anterior
     * 
     * @return ChangeSituationResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Homologa%C3%A7%C3%A3o/patch_homologacao_produtos__idProdutoHomologacao__situacoes
     */
    public function changeSituation(int $idProdutoHomologacao, array $body, string $hash): ChangeSituationResponse
    {
        $response = $this->repository->update(
            new RequestOptions(
                endpoint: "homologacao/produtos/$idProdutoHomologacao/situacoes",
                body: $body,
                headers: ["x-bling-homologacao" => $hash]
            )
        );

        return ChangeSituationResponse::fromResponse($response);
    }

    /**
     * Cria o produto da homologação.
     * 
     * @param array $body Corpo da requisição
     * @param string $hash O hash da requisição anterior
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Homologa%C3%A7%C3%A3o/post_homologacao_produtos
     */
    public function create(array $body, string $hash): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "homologacao/produtos",
                body: $body,
                headers: ["x-bling-homologacao" => $hash]
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera o produto da homologação.
     * 
     * @param int $idProdutoHomologacao ID do produto da homologação
     * @param array $body Corpo da requisição
     * @param string $hash O hash da requisição anterior
     * 
     * @return UpdateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Homologa%C3%A7%C3%A3o/put_homologacao_produtos__idProdutoHomologacao_
     */
    public function update(int $idProdutoHomologacao, array $body, string $hash): UpdateResponse
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "homologacao/produtos/$idProdutoHomologacao",
                body: $body,
                headers: ["x-bling-homologacao" => $hash]
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
