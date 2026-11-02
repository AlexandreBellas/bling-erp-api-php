<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class CreateResponseDataContato extends BaseResponseObject
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
