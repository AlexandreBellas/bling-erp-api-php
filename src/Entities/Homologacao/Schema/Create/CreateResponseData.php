<?php

namespace AleBatistella\BlingErpApi\Entities\Homologacao\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class CreateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $nome
     * @param ?float $preco
     * @param ?string $codigo
     */
    public function __construct(
        public ?int $id,
        public ?string $nome,
        public ?float $preco,
        public ?string $codigo,
    ) {
    }
}
