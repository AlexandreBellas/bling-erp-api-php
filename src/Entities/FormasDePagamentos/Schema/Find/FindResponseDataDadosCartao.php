<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\DadosCartaoTipo;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\DadosCartaoBandeira;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataDadosCartao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param \AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\DadosCartaoBandeira $bandeira
     * @param \AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\DadosCartaoTipo $tipo
     * @param ?string $cnpjCredenciadora
     */
    public function __construct(
        public DadosCartaoBandeira $bandeira,
        public DadosCartaoTipo $tipo,
        public ?string $cnpjCredenciadora,
    ) {
    }
}
