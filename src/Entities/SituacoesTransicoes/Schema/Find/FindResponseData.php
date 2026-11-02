<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?bool $ativo
     * @param array $acoes
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $modulo
     * @param \AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\Schema\Find\FindResponseDataSituacao $situacaoOrigem
     * @param \AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\Schema\Find\FindResponseDataSituacao $situacaoDestino
     */
    public function __construct(
        public int $id,
        public ?bool $ativo,
        public array $acoes,
        public ?Id $modulo,
        public FindResponseDataSituacao $situacaoOrigem,
        public FindResponseDataSituacao $situacaoDestino,
    ) {
    }
}
