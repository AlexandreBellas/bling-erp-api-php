<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da requisição.
 */
readonly final class DeleteManyParams extends QueryParams
{
    /**
     * @param array $idsPropostasComerciais
     */
    public function __construct(
        public array $idsPropostasComerciais,
    ) {
        parent::__construct(objectToArray($this));
    }
}
