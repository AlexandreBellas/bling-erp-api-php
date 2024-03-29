<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param Tipo $tipo
     * @param ?Situacao $situacao
     * @param ?string $numero
     * @param ?string $dataEmissao
     * @param ?string $dataOperacao
     * @param FindResponseDataContato $contato
     * @param ?Id $naturezaOperacao
     * @param ?Id $loja
     * @param ?int $serie
     * @param ?string $chaveAcesso
     * @param ?string $xml
     * @param ?string $linkDanfe
     * @param ?string $linkPDF
     * @param ?FindResponseDataTransporte $transporte
     */
    public function __construct(
        public ?int $id,
        public Tipo $tipo,
        public ?Situacao $situacao,
        public string $numero,
        public ?string $dataEmissao,
        public ?string $dataOperacao,
        public FindResponseDataContato $contato,
        public ?Id $naturezaOperacao,
        public ?Id $loja,
        public ?int $serie,
        public ?string $chaveAcesso,
        public ?string $xml,
        public ?string $linkDanfe,
        public ?string $linkPDF,
        public ?FindResponseDataTransporte $transporte,
    ) {
    }
}
