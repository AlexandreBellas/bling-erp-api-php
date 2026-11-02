<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Read;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class ReadResponseDataEnquadramentos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?array $tamanhoEmpresa
     * @param ?array $idMunicipio
     * @param ?array $uf
     * @param ?array $crt
     */
    public function __construct(
        public ?array $tamanhoEmpresa,
        public ?array $idMunicipio,
        public ?array $uf,
        public ?array $crt,
    ) {
    }
}
