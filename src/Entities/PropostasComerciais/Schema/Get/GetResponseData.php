<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\OptionalId;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $data
     * @param ?string $situacao
     * @param ?float $total
     * @param ?float $totalProdutos
     * @param ?int $numero
     * @param ?OptionalId $contato
     * @param ?OptionalId $loja
     */
    public function __construct(
        public ?int $id,
        public ?string $data,
        public ?string $situacao,
        public ?float $total,
        public ?float $totalProdutos,
        public ?int $numero,
        public ?OptionalId $contato,
        public ?OptionalId $loja,
    ) {}
}
