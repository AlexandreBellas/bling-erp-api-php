<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Nfes\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class GetResponseData extends BaseResponseObject
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
     * @param GetResponseDataContato $contato
     * @param ?Id $naturezaOperacao
     * @param ?Id $loja
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
