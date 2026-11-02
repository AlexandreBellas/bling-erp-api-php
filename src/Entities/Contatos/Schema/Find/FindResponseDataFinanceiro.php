<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataFinanceiro extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $limiteCredito
     * @param ?string $condicaoPagamento
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $categoria
     */
    public function __construct(
        public ?float $limiteCredito,
        public ?string $condicaoPagamento,
        public ?Id $categoria,
    ) {
    }
}
