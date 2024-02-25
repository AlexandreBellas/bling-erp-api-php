<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\GetBankSlips;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\BankSlipSituacao;

readonly final class GetBankSlipsAccountsResponse extends BaseResponseObject
{

    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $idExternal
     * @param ?string $dueDate
     * @param ?float $value
     * @param ?BankSlipSituacao $situation
     * @param ?BankSlipSituacao $iconSituation
     * @param ?string $descriptionSituation
     */
    public function __construct(
        public ?int $id,
        public ?string $idExternal,
        public ?string $dueDate,
        public ?float $value,
        public ?BankSlipSituacao $situation,
        public ?BankSlipSituacao $iconSituation,
        public ?string $descriptionSituation,
    ) {
    }
}
