<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\GetTypes;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetTypesResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $nome
     * @param ?string $mascara
     */
    public function __construct(
        public int $id,
        public ?string $nome,
        public ?string $mascara,
    ) {
    }
}
