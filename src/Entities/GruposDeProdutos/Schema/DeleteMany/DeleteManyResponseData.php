<?php

namespace AleBatistella\BlingErpApi\Entities\GruposDeProdutos\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class DeleteManyResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?array $alertas
     */
    public function __construct(
        public ?array $alertas
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "alertas" => DeleteManyResponseDataAlertas::class
        ];
    }
}
