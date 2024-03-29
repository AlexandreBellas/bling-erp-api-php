<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $numero
     * @param string $serie
     * @param UpdateResponseDataContato $contato
     */
    public function __construct(
        public int $id,
        public string $numero,
        public string $serie,
        public UpdateResponseDataContato $contato,
    ) {
    }
}
