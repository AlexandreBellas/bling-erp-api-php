<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\Situacao;

/**
 * Parâmetros da busca de contatos paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?string $dataCriacaoInicio;
    public ?string $dataCriacaoFinal;
    public ?string $dataBaseInicio;
    public ?string $dataBaseFinal;
    public ?string $situacao;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param \DateTimeInterface|string|null $dataCriacaoInicio
     * @param \DateTimeInterface|string|null $dataCriacaoFinal
     * @param \DateTimeInterface|string|null $dataBaseInicio
     * @param \DateTimeInterface|string|null $dataBaseFinal
     * @param Situacao|string|null $situacao
     * @param ?int $idContato
     * @param ?int $idContatoCobranca
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        \DateTimeInterface|string|null $dataCriacaoInicio = null,
        \DateTimeInterface|string|null $dataCriacaoFinal = null,
        \DateTimeInterface|string|null $dataBaseInicio = null,
        \DateTimeInterface|string|null $dataBaseFinal = null,
        Situacao|string|null $situacao = null,
        public ?int $idContato = null,
        public ?int $idContatoCobranca = null,
    ) {
        $this->dataCriacaoInicio = $this->prepareStringOrDateParam($dataCriacaoInicio);
        $this->dataCriacaoFinal = $this->prepareStringOrDateParam($dataCriacaoFinal);
        $this->dataBaseInicio = $this->prepareStringOrDateParam($dataBaseInicio);
        $this->dataBaseFinal = $this->prepareStringOrDateParam($dataBaseFinal);

        $this->situacao = $situacao instanceof Situacao ? $situacao->value : $situacao;

        parent::__construct(objectToArray($this));
    }
}
