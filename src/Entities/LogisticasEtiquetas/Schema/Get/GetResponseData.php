<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $link
     * @param string $observacao
     */
    public function __construct(
        public int $id,
        public string $link,
        public string $observacao,
    ) {
    }
}
