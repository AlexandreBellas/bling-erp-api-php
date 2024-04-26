<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\GenerateCombinations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GenerateCombinationsResponseDataDimensoes extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?float $largura
     * @param ?float $altura
     * @param ?float $profundidade
     * @param ?int $unidadeMedida
     */
    public function __construct(
        public ?float $largura,
        public ?float $altura,
        public ?float $profundidade,
        public ?int $unidadeMedida,
    ) {
    }
}
