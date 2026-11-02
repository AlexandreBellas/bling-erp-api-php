<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class UpdateResponseDataVariationsCommonObject extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?array $variations
     * @param ?array $warnings
     */
    public function __construct(
        public ?int $id,
        public ?array $variations,
        public ?array $warnings,
    ) {
    }
}
