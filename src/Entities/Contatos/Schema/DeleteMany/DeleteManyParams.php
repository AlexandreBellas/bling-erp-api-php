<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\DeleteMany;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da remoção de múltiplos contatos pelos IDs.
 */
readonly final class DeleteManyParams extends QueryParams
{
    /**
     * Constrói o objeto.
     *
     * @param int[] $idsContatos
     */
    public function __construct(
        public array $idsContatos,
    ) {
        parent::__construct(objectToArray($this));
    }
}
