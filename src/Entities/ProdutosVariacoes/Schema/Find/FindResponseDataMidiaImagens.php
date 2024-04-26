<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataMidiaImagens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?FindResponseDataMidiaImagensExternas[] $externas
     * @param ?FindResponseDataMidiaImagensInternas[] $internas
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
            'externas' => FindResponseDataMidiaImagensExternas::class,
            'internas' => FindResponseDataMidiaImagensInternas::class,
        ];
    }
}
