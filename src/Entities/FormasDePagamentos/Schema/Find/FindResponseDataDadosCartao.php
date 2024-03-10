<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\DadosCartaoTipo;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum\DadosCartaoBandeira;

readonly final class FindResponseDataDadosCartao extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param DadosCartaoBandeira $bandeira
     * @param DadosCartaoTipo $tipo
     * @param ?string $cnpjCredenciadora
     */
    public function __construct(
        public DadosCartaoBandeira $bandeira,
        public DadosCartaoTipo $tipo,
        public ?string $cnpjCredenciadora,
    ) {
    }
}
