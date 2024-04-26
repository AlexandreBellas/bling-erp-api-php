<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataCamposCustomizados extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $idCampoCustomizado
     * @param ?int $idVinculo
     * @param ?string $valor
     * @param ?string $item
     */
    public function __construct(
        public int $idCampoCustomizado,
        public ?int $idVinculo,
        public ?string $valor,
        public ?string $item,
    ) {
    }
}
