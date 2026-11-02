<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Schema\FindBalance;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class FindBalanceParams extends QueryParams
{
    /**
     * @param ?array $idsProdutos
     * @param ?array $codigos
     */
    public function __construct(
        public ?array $idsProdutos = null,
        public ?array $codigos = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
