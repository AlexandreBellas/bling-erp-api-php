<?php

namespace AleBatistella\BlingErpApi\Entities\Situacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param ?int $idHerdado
     * @param ?string $cor
     */
    public function __construct(
        public int $id,
        public string $nome,
        public ?int $idHerdado,
        public ?string $cor,
    ) {
    }
}
