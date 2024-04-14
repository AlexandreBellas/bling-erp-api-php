<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Create;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class CreateResponseDataVariations extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?CreateResponseDataVariationsCommonObject[] $deleted
     * @param ?CreateResponseDataVariationsCommonObject[] $updated
     * @param ?CreateResponseDataVariationsCommonObject[] $saved
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
            'deleted' => CreateResponseDataVariationsCommonObject::class,
            'updated' => CreateResponseDataVariationsCommonObject::class,
            'saved' => CreateResponseDataVariationsCommonObject::class,
        ];
    }
}
