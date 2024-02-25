<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\CancelBankSlips;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta do cancelamento de boletos - Bling Conta com situação aberto,
 * podendo cancelar um ou todos boletos vinculado ao uma Venda/Nota Fiscal,
 * quando nenhum boleto tiver emitido não se faz uso do 2FA.
 */
readonly final class CancelBankSlipsResponse extends BaseResponseRootObject
{
    /**
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): null
    {
        if (!is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        return null;
    }
}
