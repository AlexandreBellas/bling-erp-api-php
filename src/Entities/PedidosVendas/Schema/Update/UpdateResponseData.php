<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Error\ErrorField;

/**
 * Dados da resposta.
 */
readonly final class UpdateResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?array $alertas
     * @param ?array $rastreamento
     */
    public function __construct(
        public int $id,
        public ?array $alertas,
        public ?array $rastreamento,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "alertas" => ErrorField::class,
        ];
    }
}
