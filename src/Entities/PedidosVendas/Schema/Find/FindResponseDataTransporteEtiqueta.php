<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataTransporteEtiqueta extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $nome
     * @param ?string $endereco
     * @param ?string $numero
     * @param ?string $complemento
     * @param ?string $municipio
     * @param ?string $uf
     * @param ?string $cep
     * @param ?string $bairro
     * @param ?string $nomePais
     */
    public function __construct(
        public ?string $nome,
        public ?string $endereco,
        public ?string $numero,
        public ?string $complemento,
        public ?string $municipio,
        public ?string $uf,
        public ?string $cep,
        public ?string $bairro,
        public ?string $nomePais,
    ) {
    }
}
