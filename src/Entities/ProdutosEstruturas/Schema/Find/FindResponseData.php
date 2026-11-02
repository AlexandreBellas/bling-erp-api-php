<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum\TipoEstoque;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum\LancamentoEstoque;

/**
 * Dados da resposta.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum\TipoEstoque $tipoEstoque
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum\LancamentoEstoque $lancamentoEstoque
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
            "componentes" => FindResponseDataComponentes::class,
        ];
    }
}
