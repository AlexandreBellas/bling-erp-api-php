<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find\FindResponseDataItensProduto $produto
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
