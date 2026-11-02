<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips;

use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\BankSlipSituacao;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de boletos vinculados a uma venda ou nota fiscal.
 */
readonly final class GetBankSlipsParams extends QueryParams
{
    public int $idOrigem;
    public ?array $situacoes;

    /**
     * Constrói o objeto.
     *
     * @param int $idOrigem
     * @param ?array $situacoes
     */
    public function __construct(
        int $idOrigem,
        ?array $situacoes = null,
    ) {
        $this->idOrigem = $idOrigem;
        $this->situacoes = is_null($situacoes)
            ? null
            : array_map(
                fn (BankSlipSituacao|int $situacao): int => $situacao instanceof BankSlipSituacao
                    ? $situacao->value
                    : $situacao,
                $situacoes
            );

        parent::__construct(objectToArray($this));
    }
}
