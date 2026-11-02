<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $nome
     * @param ?\AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get\GetResponseDataGrupoProdutoPai $grupoProdutoPai
     */
    public function __construct(
        public ?int $id,
        public string $nome,
        public ?GetResponseDataGrupoProdutoPai $grupoProdutoPai,
    ) {}
}
