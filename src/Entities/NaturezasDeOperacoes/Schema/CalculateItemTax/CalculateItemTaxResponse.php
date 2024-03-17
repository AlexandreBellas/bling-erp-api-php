<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Schema\CalculateItemTax;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta do cálculo dos dados fiscais de um item pelo ID da natureza de operação.
 */
readonly final class CalculateItemTaxResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param CalculateItemTaxResponseData $data
     */
    public function __construct(
        public CalculateItemTaxResponseData $data
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
