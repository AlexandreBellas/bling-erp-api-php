<?php

namespace AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleTransitions;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class GetModuleTransitionsResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?bool $ativo
     * @param array $acoes
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $modulo
     * @param \AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleTransitions\GetModuleTransitionsResponseDataSituacao $situacaoOrigem
     * @param \AleBatistella\BlingErpApi\Entities\SituacoesModulos\Schema\GetModuleTransitions\GetModuleTransitionsResponseDataSituacao $situacaoDestino
     */
    public function __construct(
        public int $id,
        public ?bool $ativo,
        public array $acoes,
        public ?Id $modulo,
        public GetModuleTransitionsResponseDataSituacao $situacaoOrigem,
        public GetModuleTransitionsResponseDataSituacao $situacaoDestino,
    ) {
    }
}
