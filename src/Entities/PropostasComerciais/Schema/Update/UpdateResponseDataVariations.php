<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class UpdateResponseDataVariations extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?UpdateResponseDataVariationsCommonObject[] $deleted
     * @param ?UpdateResponseDataVariationsCommonObject[] $updated
     * @param ?UpdateResponseDataVariationsCommonObject[] $saved
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
            'deleted' => UpdateResponseDataVariationsCommonObject::class,
            'updated' => UpdateResponseDataVariationsCommonObject::class,
            'saved' => UpdateResponseDataVariationsCommonObject::class,
        ];
    }
}
