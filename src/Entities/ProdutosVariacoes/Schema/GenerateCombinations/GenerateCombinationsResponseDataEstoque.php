<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GenerateCombinationsResponseDataEstoque extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $minimo
     * @param ?float $maximo
     * @param ?int $crossdocking
     * @param ?string $localizacao
     */
    public function __construct(
        public ?float $minimo,
        public ?float $maximo,
        public ?int $crossdocking,
        public ?string $localizacao,
    ) {
    }
}
