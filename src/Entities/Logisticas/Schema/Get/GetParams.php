<?php

namespace AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Logisticas\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Logisticas\Enum\TipoIntegracao;

/**
 * Parâmetros da busca de logísticas paginadas.
 */
readonly final class GetParams extends QueryParams
{
    public ?string $situacao;
    public ?string $tipoIntegracao;
    public ?array $tipoIntegracoes;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param TipoIntegracao|string|null $tipoIntegracao
     * @param TipoIntegracao[]|string[]|null $tipoIntegracoes
     * @param Situacao|string|null $situacao
     * @param ?bool $logisticasReversas
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        TipoIntegracao|string|null $tipoIntegracao = null,
        ?array $tipoIntegracoes = null,
        Situacao|string|null $situacao = null,
        public ?bool $logisticasReversas = null,
    ) {
        $this->tipoIntegracao = $tipoIntegracao instanceof TipoIntegracao
            ? $tipoIntegracao->value
            : $tipoIntegracao;

        $this->tipoIntegracoes = array_map(
            fn(TipoIntegracao|string|null $tipoIntegracao) => $tipoIntegracao instanceof TipoIntegracao
            ? $tipoIntegracao->value
            : $tipoIntegracao,
            $tipoIntegracoes
        );

        $this->situacao = $situacao instanceof Situacao ? $situacao->value : $situacao;

        parent::__construct(objectToArray($this));
    }
}
