<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataTamanho extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $minimo
     * @param ?int $maximo
     */
    public function __construct(
        public ?int $minimo,
        public ?int $maximo,
    ) {
    }
}
