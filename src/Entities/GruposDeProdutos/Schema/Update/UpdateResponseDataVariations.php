<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class UpdateResponseDataVariations extends BaseResponseObject
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
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "deleted" => UpdateResponseDataVariationsCommonObject::class,
            "updated" => UpdateResponseDataVariationsCommonObject::class,
            "saved" => UpdateResponseDataVariationsCommonObject::class,
        ];
    }
}
