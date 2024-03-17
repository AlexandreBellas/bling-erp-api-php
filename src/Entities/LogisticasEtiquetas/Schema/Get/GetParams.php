<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\Enum\Formato;

/**
 * Parâmetros da obtenção das etiquetas dos pedidos de venda a partir dos ID's dos pedidos.
 */
readonly final class GetParams extends QueryParams
{
    public ?string $formato;

    /**
     * Constrói o objeto.
     *
     * @param Formato|string|null $formato
     * @param int[]|null $idsVendas
     */
    public function __construct(
        Formato|string|null $formato = null,
        public ?array $idsVendas = null,
    ) {
        $this->formato = $formato instanceof Formato ? $formato->value : $formato;

        parent::__construct(objectToArray($this));
    }
}
