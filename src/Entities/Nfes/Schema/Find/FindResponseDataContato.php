<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $nome
     * @param string $numeroDocumento
     * @param ?string $ie
     * @param ?string $rg
     * @param ?string $telefone
     * @param ?string $email
     * @param ?FindResponseDataContatoEndereco $endereco
     */
    public function __construct(
        public ?int $id,
        public string $nome,
        public string $numeroDocumento,
        public ?string $ie,
        public ?string $rg,
        public ?string $telefone,
        public ?string $email,
        public ?FindResponseDataContatoEndereco $endereco,
    ) {
    }
}
