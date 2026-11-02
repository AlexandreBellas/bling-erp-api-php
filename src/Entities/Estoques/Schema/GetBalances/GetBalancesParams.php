<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class GetBalancesParams extends QueryParams
{
    /**
     * @param array $idsProdutos
     * @param ?string $codigo
     */
    public function __construct(
        public array $idsProdutos,
        public ?string $codigo = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
