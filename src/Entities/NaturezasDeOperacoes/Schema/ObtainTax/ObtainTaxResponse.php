<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\ObtainTax;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta do cálculo dos dados fiscais de um item pelo ID da natureza de operação.
 */
readonly final class ObtainTaxResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ObtainTaxResponseData $data
     */
    public function __construct(
        public ObtainTaxResponseData $data
    ) {}

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
