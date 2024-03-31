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
    public ?string $dataEmissaoInicial;
    public ?string $dataEmissaoFinal;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param Situacao|int|null $situacao
     * @param \DateTimeInterface|string|null $dataEmissaoInicial
     * @param \DateTimeInterface|string|null $dataEmissaoFinal
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        Situacao|string|null $situacao = null,
        \DateTimeInterface|string|null $dataEmissaoInicial = null,
        \DateTimeInterface|string|null $dataEmissaoFinal = null,
    ) {
        $this->situacao = $situacao instanceof Situacao ? $situacao->value : $situacao;

        $this->dataEmissaoInicial = $this->prepareStringOrDateParam($dataEmissaoInicial);
        $this->dataEmissaoFinal = $this->prepareStringOrDateParam($dataEmissaoFinal);

        parent::__construct(objectToArray($this));
    }
}
