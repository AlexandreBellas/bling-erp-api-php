<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $descricao
     * @param ?string $codigoFornecedor
     * @param ?string $unidade
     * @param float $valor
     * @param ?float $quantidade
     * @param ?float $aliquotaIPI
     * @param ?string $descricaoDetalhada
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find\FindResponseDataItensProduto $produto
     */
    public function __construct(
        public string $descricao,
        public ?string $codigoFornecedor,
        public ?string $unidade,
        public float $valor,
        public ?float $quantidade,
        public ?float $aliquotaIPI,
        public ?string $descricaoDetalhada,
        public ?FindResponseDataItensProduto $produto,
    ) {
    }
}
