<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\Enum\TipoIntegracao;

/**
 * Parâmetros da obtenção de serviços de logísticas paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?string $tipoIntegracao;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param TipoIntegracao|string|null $tipoIntegracao
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        TipoIntegracao|string|null $tipoIntegracao = null,
    ) {
        $this->tipoIntegracao = $tipoIntegracao instanceof TipoIntegracao
            ? $tipoIntegracao->value
            : $tipoIntegracao;

        parent::__construct(objectToArray($this));
    }
}
