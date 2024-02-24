<?php

namespace AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Enum\Situacao;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param Situacao $situacao
     * @param string $vencimento
     * @param float $valor
     * @param Id $contato
     * @param ?Id $formaPagamento
     */
    public function __construct(
        public ?int $id,
        public Situacao $situacao,
        public string $vencimento,
        public float $valor,
        public Id $contato,
        public ?Id $formaPagamento,
    ) {
    }
}
