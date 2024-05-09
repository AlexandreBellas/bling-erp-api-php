<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseDataFiliais extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $cnpj
     * @param ?string $unidadeNegocio
     * @param ?Id $deposito
     * @param ?bool $padrao
     */
    public function __construct(
        public ?string $cnpj,
        public ?string $unidadeNegocio,
        public ?Id $deposito,
        public ?bool $padrao,
    ) {
    }
}
