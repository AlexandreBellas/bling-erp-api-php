<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\PostStock;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta do lançamento do estoque de uma nota fiscal pelo ID, no depósito
 * padrão.
 */
readonly final class PostStockResponse extends BaseResponseRootObject
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
