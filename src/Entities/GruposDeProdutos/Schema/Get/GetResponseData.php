<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $nome
     * @param ?GetResponseDataGrupoProdutoPai $grupoProdutoPai
     */
    public function __construct(
        public ?int $id,
        public string $nome,
        public ?GetResponseDataGrupoProdutoPai $grupoProdutoPai,
    ) {}
}
