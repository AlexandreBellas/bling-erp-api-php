<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class CreateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $numero
     * @param string $serie
     * @param CreateResponseDataContato $contato
     */
    public function __construct(
        public int $id,
        public string $numero,
        public string $serie,
        public CreateResponseDataContato $contato,
    ) {
    }
}
