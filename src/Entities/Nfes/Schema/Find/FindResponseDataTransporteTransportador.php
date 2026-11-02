<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataTransporteTransportador extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $nome
     * @param ?string $numeroDocumento
     */
    public function __construct(
        public string $nome,
        public ?string $numeroDocumento,
    ) {
    }
}
