<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Contatos\Enum\Situacao;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $nome
     * @param ?string $codigo
     * @param ?Situacao $situacao
     * @param ?string $numeroDocumento
     * @param ?string $telefone
     * @param ?string $celular
     */
    public function __construct(
        public ?int $id,
        public ?string $nome,
        public ?string $codigo,
        public ?Situacao $situacao,
        public ?string $numeroDocumento,
        public ?string $telefone,
        public ?string $celular,
    ) {
    }
}
