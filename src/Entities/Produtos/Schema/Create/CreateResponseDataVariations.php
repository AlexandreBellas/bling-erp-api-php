<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class CreateResponseDataVariations extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?array $deleted
     * @param ?array $updated
     * @param ?array $saved
     */
    public function __construct(
        public ?array $deleted,
        public ?array $updated,
        public ?array $saved,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "deleted" => CreateResponseDataVariationsCommonObject::class,
            "updated" => CreateResponseDataVariationsCommonObject::class,
            "saved" => CreateResponseDataVariationsCommonObject::class,
        ];
    }
}
