<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\Enum\UF;

readonly final class FindResponseDataEnderecoDados extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $endereco
     * @param ?string $cep
     * @param ?string $bairro
     * @param ?string $municipio
     * @param ?UF $uf
     * @param ?string $numero
     * @param ?string $complemento
     */
    public function __construct(
        public ?string $endereco,
        public ?string $cep,
        public ?string $bairro,
        public ?string $municipio,
        public ?UF $uf,
        public ?string $numero,
        public ?string $complemento,
    ) {
    }
}
