<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataNotaFiscalItem extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $codigoServico
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $produto
     */
    public function __construct(
        public ?string $codigoServico,
        public ?Id $produto,
    ) {
    }
}
