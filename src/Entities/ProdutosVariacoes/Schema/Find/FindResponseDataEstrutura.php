<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\TipoEstoque;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\LancamentoEstoque;

readonly final class FindResponseDataEstrutura extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param TipoEstoque $tipoEstoque
     * @param LancamentoEstoque $lancamentoEstoque
     * @param FindResponseDataEstruturaComponentes[] $componentes
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
            'componentes' => FindResponseDataEstruturaComponentes::class
        ];
    }
}
