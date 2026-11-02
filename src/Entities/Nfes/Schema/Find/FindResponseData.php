<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param \AleBatistella\BlingErpApi\Entities\Nfes\Enum\Tipo $tipo
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfes\Enum\Situacao $situacao
     * @param string $numero
     * @param ?string $dataEmissao
     * @param ?string $dataOperacao
     * @param \AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find\FindResponseDataContato $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $naturezaOperacao
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $loja
     * @param ?int $serie
     * @param ?float $valorNota
     * @param ?string $chaveAcesso
     * @param ?string $xml
     * @param ?string $linkDanfe
     * @param ?string $linkPDF
     * @param ?string $numeroPedidoLoja
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find\FindResponseDataTransporte $transporte
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $vendedor
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
        public ?float $valorNota,
        public ?string $chaveAcesso,
        public ?string $xml,
        public ?string $linkDanfe,
        public ?string $linkPDF,
        public ?string $numeroPedidoLoja,
        public ?FindResponseDataTransporte $transporte,
        public ?Id $vendedor,
    ) {}
}
