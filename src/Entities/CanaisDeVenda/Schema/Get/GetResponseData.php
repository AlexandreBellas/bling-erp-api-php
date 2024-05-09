<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum\Situacao;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $descricao
     * @param ?string $tipo
     * @param ?Situacao $situacao
     */
    public function __construct(
        public ?int $id,
        public ?string $descricao,
        public ?string $tipo,
        public ?Situacao $situacao,
    ) {
    }
}
