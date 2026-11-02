<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataMidiaImagens extends BaseResponseObject
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
            "externas" => FindResponseDataMidiaImagensExternas::class,
            "internas" => FindResponseDataMidiaImagensInternas::class,
        ];
    }
}
