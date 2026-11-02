<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataEndereco extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?\AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find\FindResponseDataEnderecoDados $geral
     * @param ?\AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find\FindResponseDataEnderecoDados $cobranca
     */
    public function __construct(
        public ?FindResponseDataEnderecoDados $geral,
        public ?FindResponseDataEnderecoDados $cobranca,
    ) {
    }
}
