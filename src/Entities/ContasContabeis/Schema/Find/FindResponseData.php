<?php

namespace AleBatistella\BlingErpApi\Entities\ContasContabeis\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $descricao
     */
    public function __construct(
        public ?int $id,
        public ?string $descricao,
    ) {
    }
}
