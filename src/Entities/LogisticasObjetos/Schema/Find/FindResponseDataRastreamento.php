<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Enum\Situacao;

readonly final class FindResponseDataRastreamento extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $codigo
     * @param string $descricao
     * @param Situacao $situacao
     * @param string $origem
     * @param string $destino
     * @param string $ultimaAlteracao
     * @param string $url
     */
    public function __construct(
        public string $codigo,
        public string $descricao,
        public Situacao $situacao,
        public string $origem,
        public string $destino,
        public string $ultimaAlteracao,
        public string $url,
    ) {
    }
}
