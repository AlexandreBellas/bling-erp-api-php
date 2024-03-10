<?php

namespace AleBatistella\BlingErpApi\Entities\Depositos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Depositos\Enum\Situacao;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $descricao
     * @param Situacao $situacao
     * @param bool $padrao
     * @param bool $desconsiderarSaldo
     */
    public function __construct(
        public ?int $id,
        public string $descricao,
        public Situacao $situacao,
        public bool $padrao,
        public bool $desconsiderarSaldo,
    ) {
    }
}
