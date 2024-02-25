<?php

namespace AleBatistella\BlingErpApi\Entities\ContasContabeis\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\ContasContabeis\Enum\Situacao;

/**
 * Parâmetros da busca de contas contábeis paginadas.
 */
readonly final class GetParams extends QueryParams
{
    /** @property int[]|null $situacoes */
    public ?array $situacoes;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina N° da página da listagem
     * @param ?int $limite Quantidade de registros que devem ser exibidos por página
     * @param ?bool $ocultarInvisiveis Oculta contas contábeis invisíveis
     * @param ?bool $ocultarContasIntegracaoPagamento Oculta contas contábeis de integração com gateway de pagamento
     * @param ?bool $ocultarTipoContaBancaria Oculta contas contábeis do tipo conta bancária
     * @param Situacao[]|int[]|null $situacoes Situação da conta contábil
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?bool $ocultarInvisiveis = null,
        public ?bool $ocultarContasIntegracaoPagamento = null,
        public ?bool $ocultarTipoContaBancaria = null,
        ?array $situacoes = null
    ) {
        $this->situacoes = array_map(
            fn(Situacao|int|null $situacao) => $situacao instanceof Situacao
            ? $situacao->value
            : $situacao,
            $situacoes
        );

        parent::__construct(objectToArray($this));
    }
}
