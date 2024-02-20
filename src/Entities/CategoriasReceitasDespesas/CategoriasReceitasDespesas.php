<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas;

use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Schema\Get\GetParams;
use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Schema\Find\FindResponse;
use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Schema\Get\GetResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com categorias - receitas e despesas.
 *
 * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Receitas%20e%20Despesas
 */
class CategoriasReceitasDespesas extends BaseEntity
{
    /**
     * Obtém categorias de receitas e despesas
     *
     * @param GetParams|array|null $params Parâmetros para a busca.
     * 
     * @return GetResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Receitas%20e%20Despesas/get_categorias_receitas_despesas
     */
    public function get(GetParams|array|null $params = null): GetResponse
    {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "categorias/receitas-despesas",
                queryParams: $params
            )
        );

        return GetResponse::fromResponse($response);
    }

    /**
     * Obtém uma categoria de receita e despesa.
     * 
     * @param int $idCategoria ID da categoria de receita e despesa.
     * 
     * @return FindResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Categorias%20-%20Receitas%20e%20Despesas/get_categorias_receitas_despesas__idCategoria_
     */
    public function find(int $idCategoriaProduto): FindResponse
    {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "categorias/receitas-despesas/$idCategoriaProduto",
            )
        );

        return FindResponse::fromResponse($response);
    }
}
