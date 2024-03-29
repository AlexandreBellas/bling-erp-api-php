<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataContatoEndereco extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $endereco
     * @param ?string $numero
     * @param ?string $complemento
     * @param string $bairro
     * @param ?string $cep
     * @param string $municipio
     * @param ?string $uf
     * @param ?string $pais
     */
    public function __construct(
        public string $endereco,
        public ?string $numero,
        public ?string $complemento,
        public string $bairro,
        public ?string $cep,
        public string $municipio,
        public ?string $uf,
        public ?string $pais,
    ) {
    }
}
