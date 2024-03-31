<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\GetQuantity;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da obtenção da quantidade de notificações de uma empresa no
 * período informado. Caso período não seja informado, será considerado o ano
 * atual.
 */
readonly final class GetQuantityResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GetQuantityResponseData $data
     */
    public function __construct(
        public GetQuantityResponseData $data
    ) {
    }

    /**
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        if (is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        return self::from($response->body->content);
    }
}
