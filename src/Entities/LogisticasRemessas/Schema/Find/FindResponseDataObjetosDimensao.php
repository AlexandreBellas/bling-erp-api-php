<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataObjetosDimensao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param float $peso
     * @param float $altura
     * @param float $largura
     * @param float $comprimento
     * @param float $diametro
     */
    public function __construct(
        public float $peso,
        public float $altura,
        public float $largura,
        public float $comprimento,
        public float $diametro,
    ) {
    }
}
