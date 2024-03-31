<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\ChangeSituation;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da alteração de situação de um pedido de compra pelo ID.
 */
readonly final class ChangeSituationResponse extends BaseResponseRootObject
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
