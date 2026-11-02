<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GenerateCombinationsResponseDataMidiaImagens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?array $externas
     * @param ?array $internas
     */
    public function __construct(
        public ?array $externas,
        public ?array $internas,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "externas" => GenerateCombinationsResponseDataMidiaImagensExternas::class,
            "internas" => GenerateCombinationsResponseDataMidiaImagensInternas::class,
        ];
    }
}
