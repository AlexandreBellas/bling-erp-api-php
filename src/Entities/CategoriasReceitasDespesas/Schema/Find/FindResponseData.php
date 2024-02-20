<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?int $idCategoriaPai
     * @param string $descricao
     * @param Tipo $tipo
     * @param ?Situacao $situacao
     */
    public function __construct(
        public ?int $id,
        public ?int $idCategoriaPai,
        public string $descricao,
        public Tipo $tipo,
        public ?Situacao $situacao,
    ) {
    }
}
