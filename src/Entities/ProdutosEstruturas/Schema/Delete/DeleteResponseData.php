<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Delete;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\Error;

/**
 * Dados da resposta.
 */
readonly final class DeleteResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?array $alertas
     */
    public function __construct(
        public ?array $alertas
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "alertas" => Error::class
        ];
    }
}
