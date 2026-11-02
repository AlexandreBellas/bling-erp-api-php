<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataCobranca extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $dataBase
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find\FindResponseDataCobrancaVencimento $vencimento
     */
    public function __construct(
        public ?string $dataBase,
        public ?Id $contato,
        public ?FindResponseDataCobrancaVencimento $vencimento,
    ) {
    }
}
