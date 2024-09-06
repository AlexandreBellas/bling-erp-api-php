<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataFornecedorContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $nome
     */
    public function __construct(
        public ?int $id,
        public ?string $nome,
    ) {}
}
