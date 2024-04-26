<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da ação responsável por retornar o produto pai com combinação de
 * novas variações a partir dos atributos.
 */
readonly final class GenerateCombinationsResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param GenerateCombinationsResponseData $data
     */
    public function __construct(
        public GenerateCombinationsResponseData $data
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
