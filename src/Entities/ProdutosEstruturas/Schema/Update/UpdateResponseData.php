<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Update\UpdateResponseDataVariations $variations
     * @param ?array $warnings
     */
    public function __construct(
        public int $id,
        public ?UpdateResponseDataVariations $variations,
        public ?array $warnings,
    ) {
    }
}
