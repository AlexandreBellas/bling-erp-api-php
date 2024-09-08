<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\CancelBankSlips;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta do cancelamento de um ou todos os boletos em aberto vinculados a uma venda ou nota fiscal.
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
