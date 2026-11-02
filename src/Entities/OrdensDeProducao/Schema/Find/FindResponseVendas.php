<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseVendas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $numero
     * @param ?\AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find\FindResponseVendasContato $contato
     */
    public function __construct(
        public ?int $numero,
        public ?FindResponseVendasContato $contato,
    ) {}
}
