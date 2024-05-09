<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetResponseDataOrigem extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $tipoOrigem
     * @param ?string $numero
     * @param ?string $dataEmissao
     * @param ?float $valor
     * @param ?int $situacao
     * @param ?string $url
     */
    public function __construct(
        public ?int $id,
        public ?string $tipoOrigem,
        public ?string $numero,
        public ?string $dataEmissao,
        public ?float $valor,
        public ?int $situacao,
        public ?string $url,
    ) {
    }
}
