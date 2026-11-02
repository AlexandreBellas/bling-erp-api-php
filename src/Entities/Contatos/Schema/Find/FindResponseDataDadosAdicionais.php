<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\Enum\Genero;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataDadosAdicionais extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $dataNascimento
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\Enum\Genero $sexo
     * @param ?string $naturalidade
     */
    public function __construct(
        public ?string $dataNascimento,
        public ?Genero $sexo,
        public ?string $naturalidade,
    ) {
    }
}
