<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?FindResponseDataItensProduto $produto
     * @param ?string $codigo
     * @param ?string $unidade
     * @param ?float $quantidade
     * @param ?float $desconto
     * @param ?float $valor
     * @param ?string $descricaoDetalhada
     */
    public function __construct(
        public ?FindResponseDataItensProduto $produto,
        public ?string $codigo,
        public ?string $unidade,
        public ?float $quantidade,
        public ?float $desconto,
        public ?float $valor,
        public ?string $descricaoDetalhada,
    ) {}
}
