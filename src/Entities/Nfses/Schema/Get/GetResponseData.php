<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfses\Enum\Situacao;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $numero
     * @param string $numeroRPS
     * @param string $serie
     * @param ?Situacao $situacao
     * @param ?string $dataEmissao
     * @param ?int $valor
     * @param GetResponseDataContato $contato
     */
    public function __construct(
        public int $id,
        public ?string $numero,
        public string $numeroRPS,
        public string $serie,
        public ?Situacao $situacao,
        public ?string $dataEmissao,
        public ?int $valor,
        public GetResponseDataContato $contato,
    ) {
    }
}
