<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\GetByLogistic;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum\Situacao;

readonly final class GetByLogisticResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $numeroPlp
     * @param Situacao $situacao
     * @param string $descricao
     * @param string $dataCriacao
     * @param int[] $objetos
     */
    public function __construct(
        public int $id,
        public string $numeroPlp,
        public Situacao $situacao,
        public string $descricao,
        public string $dataCriacao,
        public array $objetos,
    ) {
    }
}
