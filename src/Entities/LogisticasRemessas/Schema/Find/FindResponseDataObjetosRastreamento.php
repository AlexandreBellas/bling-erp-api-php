<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum\SituacaoRastreamento;

readonly final class FindResponseDataObjetosRastreamento extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $codigo
     * @param string $descricao
     * @param SituacaoRastreamento $situacao
     * @param string $origem
     * @param string $destino
     * @param string $ultimaAlteracao
     * @param string $url
     */
    public function __construct(
        public string $codigo,
        public string $descricao,
        public SituacaoRastreamento $situacao,
        public string $origem,
        public string $destino,
        public string $ultimaAlteracao,
        public string $url,
    ) {
    }
}
