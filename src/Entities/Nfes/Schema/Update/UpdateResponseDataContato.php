<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class UpdateResponseDataContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $nome
     */
    public function __construct(
        public ?string $nome
    ) {
    }
}
