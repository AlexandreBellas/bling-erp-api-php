<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $descricao
     * @param string $data
     * @param string $numero
     * @param float $valor
     * @param Situacao $situacao
     * @param Id $contato
     */
    public function __construct(
        public ?int $id,
        public string $descricao,
        public string $data,
        public string $numero,
        public float $valor,
        public Situacao $situacao,
        public Id $contato,
    ) {
    }
}
