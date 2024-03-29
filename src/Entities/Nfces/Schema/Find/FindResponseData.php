<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Nfces\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Nfces\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param Tipo $tipo
     * @param ?Situacao $situacao
     * @param string $numero
     * @param ?string $dataEmissao
     * @param ?string $dataOperacao
     * @param FindResponseDataContato $contato
     * @param ?Id $naturezaOperacao
     * @param ?Id $loja
     * @param string $serie
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
        public string $serie,
    ) {
    }
}
