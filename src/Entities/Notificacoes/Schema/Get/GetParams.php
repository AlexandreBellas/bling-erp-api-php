<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da obtenção de todas as notificações de uma empresa no período
 * informado. Caso período não seja informado, será considerado o ano atual.
 */
readonly final class GetParams extends QueryParams
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
