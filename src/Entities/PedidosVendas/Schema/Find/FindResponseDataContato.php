<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\TipoPessoa;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataContato extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $nome
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum\TipoPessoa $tipoPessoa
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
