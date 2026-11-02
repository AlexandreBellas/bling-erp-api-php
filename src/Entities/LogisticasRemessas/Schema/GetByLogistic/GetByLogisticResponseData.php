<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\GetByLogistic;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum\Situacao;

/**
 * Dados da resposta.
 */
readonly final class GetByLogisticResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $numeroPlp
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum\Situacao $situacao
     * @param string $descricao
     * @param string $dataCriacao
     * @param array $objetos
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
