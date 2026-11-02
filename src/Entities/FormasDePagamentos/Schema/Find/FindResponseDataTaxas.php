<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataTaxas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $aliquota
     * @param ?float $valor
     * @param ?int $prazo
     */
    public function __construct(
        public ?float $aliquota,
        public ?float $valor,
        public ?int $prazo,
    ) {
    }
}
