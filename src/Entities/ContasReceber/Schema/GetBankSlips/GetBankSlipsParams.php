<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\BankSlipSituacao;

/**
 * Parâmetros da busca de boletos - Bling conta vinculados a um idOrigem.
 */
readonly final class GetBankSlipsParams extends QueryParams
{
    /** @property string[]|null $situations */
    public ?array $situations;

    /**
     * Constrói o objeto.
     *
     * @param BankSlipSituacao[]|string[]|null $situations
     */
    public function __construct(
        ?array $situations = null,
    ) {
        $this->situations = array_map(
            fn(BankSlipSituacao|int|null $situacao) => $situacao instanceof BankSlipSituacao
            ? $situacao->value
            : $situacao,
            $situations
        );

        parent::__construct(objectToArray($this));
    }
}
