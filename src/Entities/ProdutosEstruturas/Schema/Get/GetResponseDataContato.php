<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum\TipoPessoa;

readonly final class GetResponseDataContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param ?TipoPessoa $tipoPessoa
     * @param ?string $numeroDocumento
     */
    public function __construct(
        public int $id,
        public string $nome,
        public ?TipoPessoa $tipoPessoa,
        public ?string $numeroDocumento,
    ) {
    }
}
