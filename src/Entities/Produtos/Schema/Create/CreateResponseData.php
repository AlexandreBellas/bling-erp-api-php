<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class CreateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?\AleBatistella\BlingErpApi\Entities\Produtos\Schema\Create\CreateResponseDataVariations $variations
     * @param ?array $warnings
     */
    public function __construct(
        public int $id,
        public ?CreateResponseDataVariations $variations,
        public ?array $warnings,
    ) {
    }
}
