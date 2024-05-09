<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\GetTypes;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum\Agrupador;

/**
 * Parâmetros da busca de tipos de canais de venda paginados.
 */
readonly final class GetTypesParams extends QueryParams
{
    public ?int $agrupador;

    /**
     * Constrói o objeto.
     * 
     * @param Agrupador|int|null $agrupador Agrupador do canal de venda
     */
    public function __construct(
        Agrupador|int|null $agrupador = null,
    ) {
        $this->agrupador = ($agrupador instanceof Agrupador) ? $agrupador->value : $agrupador;

        parent::__construct(objectToArray($this));
    }
}
