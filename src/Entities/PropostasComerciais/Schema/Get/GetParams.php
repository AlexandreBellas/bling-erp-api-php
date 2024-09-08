<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;

/**
 * Parâmetros da busca de propostas comerciais paginadas.
 */
readonly final class GetParams extends QueryParams
{
    public ?string $dataInicial;
    public ?string $dataFinal;

    /**
     * Constrói o objeto.
     *
     * @param ?string $situacao
     * @param ?int $idContato
     * @param \DateTimeInterface|string|null $dataInicial
     * @param \DateTimeInterface|string|null $dataFinal
     * @param ?int $pagina
     * @param ?int $limite
     */
    public function __construct(
        public ?string $situacao = null,
        public ?int $idContato = null,
        \DateTimeInterface|string|null $dataInicial = null,
        \DateTimeInterface|string|null $dataFinal = null,
        public ?int $pagina = null,
        public ?int $limite = null,
    ) {
        $this->dataInicial = $this->prepareStringOrDateParam($dataInicial);
        $this->dataFinal = $this->prepareStringOrDateParam($dataFinal);

        parent::__construct(objectToArray($this));
    }
}
