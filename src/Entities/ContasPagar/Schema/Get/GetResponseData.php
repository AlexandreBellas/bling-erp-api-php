<?php

namespace AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Enum\Situacao;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param \AleBatistella\BlingErpApi\Entities\ContasPagar\Enum\Situacao $situacao
     * @param string $vencimento
     * @param float $valor
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $formaPagamento
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
