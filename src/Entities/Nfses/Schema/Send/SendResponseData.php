<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\Send;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfses\Enum\Situacao;

/**
 * Dados da resposta.
 */
readonly final class SendResponseData extends BaseResponseObject
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
     * @param ?float $valor
     * @param \AleBatistella\BlingErpApi\Entities\Nfses\Schema\Send\SendResponseDataContato $contato
     * @param ?string $link
     * @param ?string $codigoVerificacao
     */
    public function __construct(
        public int $id,
        public ?string $numero,
        public string $numeroRPS,
        public string $serie,
        public ?Situacao $situacao,
        public ?string $dataEmissao,
        public ?float $valor,
        public SendResponseDataContato $contato,
        public ?string $link,
        public ?string $codigoVerificacao,
    ) {
    }
}
