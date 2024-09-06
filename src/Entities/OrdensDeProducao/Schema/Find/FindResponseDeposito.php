<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDeposito extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $idDestino
     * @param ?int $idOrigem
     */
    public function __construct(
        public ?int $idDestino,
        public ?int $idOrigem,
    ) {}
}
