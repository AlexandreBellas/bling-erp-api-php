<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataItensProduto extends BaseResponseObject
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
    ) {}
}
