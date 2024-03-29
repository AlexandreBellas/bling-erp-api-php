<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Nfses\Enum\Situacao;

/**
 * Parâmetros da busca de notas fiscais de serviço paginadas.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $situacao;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param Situacao|int|null $situacao
     * @param ?string $dataEmissaoInicial
     * @param ?string $dataEmissaoFinal
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        Situacao|string|null $situacao = null,
        public ?string $dataEmissaoInicial = null,
        public ?string $dataEmissaoFinal = null,
    ) {
        $this->situacao = $situacao instanceof Situacao ? $situacao->value : $situacao;

        parent::__construct(objectToArray($this));
    }
}
