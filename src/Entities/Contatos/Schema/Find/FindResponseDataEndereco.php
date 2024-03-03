<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataEndereco extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?FindResponseDataEnderecoDados $geral
     * @param ?FindResponseDataEnderecoDados $cobranca
     */
    public function __construct(
        public ?FindResponseDataEnderecoDados $geral,
        public ?FindResponseDataEnderecoDados $cobranca,
    ) {
    }
}
