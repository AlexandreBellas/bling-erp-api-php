<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Produtos\Enum\TipoEstoque;
use AleBatistella\BlingErpApi\Entities\Produtos\Enum\LancamentoEstoque;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataEstrutura extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\Produtos\Enum\TipoEstoque $tipoEstoque
     * @param \AleBatistella\BlingErpApi\Entities\Produtos\Enum\LancamentoEstoque $lancamentoEstoque
     * @param array $componentes
     */
    public function __construct(
        public TipoEstoque $tipoEstoque,
        public LancamentoEstoque $lancamentoEstoque,
        public array $componentes,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "componentes" => FindResponseDataEstruturaComponentes::class
        ];
    }
}
