<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseDataItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $codigo
     * @param ?string $unidade
     * @param float $quantidade
     * @param ?float $desconto
     * @param float $valor
     * @param ?float $aliquotaIPI
     * @param string $descricao
     * @param ?string $descricaoDetalhada
     * @param ?Id $produto
     * @param ?FindResponseDataItensComissao $comissao
     */
    public function __construct(
        public int $id,
        public ?string $codigo,
        public ?string $unidade,
        public float $quantidade,
        public ?float $desconto,
        public float $valor,
        public ?float $aliquotaIPI,
        public string $descricao,
        public ?string $descricaoDetalhada,
        public ?Id $produto,
        public ?FindResponseDataItensComissao $comissao,
    ) {
    }
}
