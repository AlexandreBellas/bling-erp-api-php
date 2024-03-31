<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\GetQuantity;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da obtenção da quantidade de notificações de uma empresa no
 * período informado. Caso período não seja informado, será considerado o ano
 * atual.
 */
readonly final class GetQuantityParams extends QueryParams
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $periodo
     */
    public function __construct(
        public ?string $periodo = null,
    ) {
        parent::__construct(objectToArray($this));
    }
}
