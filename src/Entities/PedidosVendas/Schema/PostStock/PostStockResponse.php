<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\PostStock;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta do lançamento do estoque de um pedido de venda pelo ID, no depósito
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
