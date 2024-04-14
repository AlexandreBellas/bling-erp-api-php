<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?UpdateResponseDataVariations $variations
     * @param ?string[] $warnings
     */
    public function __construct(
        public int $id,
        public ?UpdateResponseDataVariations $variations,
        public ?array $warnings,
    ) {
    }
}
