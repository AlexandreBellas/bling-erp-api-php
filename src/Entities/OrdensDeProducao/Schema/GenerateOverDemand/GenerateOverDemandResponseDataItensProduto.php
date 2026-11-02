<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\GenerateOverDemand;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GenerateOverDemandResponseDataItensProduto extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $nome
     * @param ?string $codigo
     */
    public function __construct(
        public int $id,
        public ?string $nome,
        public ?string $codigo,
    ) {}
}
