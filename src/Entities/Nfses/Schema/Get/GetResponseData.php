<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfses\Enum\Situacao;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $numero
     * @param string $numeroRPS
     * @param string $serie
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Enum\Situacao $situacao
     * @param ?string $dataEmissao
     * @param ?int $valor
     * @param \AleBatistella\BlingErpApi\Entities\Nfses\Schema\Get\GetResponseDataContato $contato
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
