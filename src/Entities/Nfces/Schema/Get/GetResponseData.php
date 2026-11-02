<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfces\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Nfces\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param \AleBatistella\BlingErpApi\Entities\Nfces\Enum\Tipo $tipo
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfces\Enum\Situacao $situacao
     * @param ?string $numero
     * @param ?string $dataEmissao
     * @param ?string $dataOperacao
     * @param \AleBatistella\BlingErpApi\Entities\Nfces\Schema\Get\GetResponseDataContato $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $naturezaOperacao
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $loja
     */
    public function __construct(
        public ?int $id,
        public Tipo $tipo,
        public ?Situacao $situacao,
        public ?string $numero,
        public ?string $dataEmissao,
        public ?string $dataOperacao,
        public GetResponseDataContato $contato,
        public ?Id $naturezaOperacao,
        public ?Id $loja,
    ) {
    }
}
