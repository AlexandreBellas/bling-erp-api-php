<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Contatos\Enum\Criterio;
use AleBatistella\BlingErpApi\Entities\Shared\Enum\UF;

/**
 * Parâmetros da busca de contatos paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $criterio;
    public ?string $dataInclusaoInicial;
    public ?string $dataInclusaoFinal;
    public ?string $dataAlteracaoInicial;
    public ?string $dataAlteracaoFinal;
    public ?string $uf;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param ?string $pesquisa
     * @param Criterio|int|null $criterio
     * @param \DateTimeInterface|string|null $dataInclusaoInicial
     * @param \DateTimeInterface|string|null $dataInclusaoFinal
     * @param \DateTimeInterface|string|null $dataAlteracaoInicial
     * @param \DateTimeInterface|string|null $dataAlteracaoFinal
     * @param ?int $idTipoContato
     * @param ?int $idVendedor
     * @param UF|string|null $uf
     * @param ?int[] $idsContatos
     * @param ?string $numeroDocumento
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?string $pesquisa = null,
        Criterio|int|null $criterio = null,
        \DateTimeInterface|string|null $dataInclusaoInicial = null,
        \DateTimeInterface|string|null $dataInclusaoFinal = null,
        \DateTimeInterface|string|null $dataAlteracaoInicial = null,
        \DateTimeInterface|string|null $dataAlteracaoFinal = null,
        public ?int $idTipoContato = null,
        public ?int $idVendedor = null,
        UF|string|null $uf = null,
        public ?array $idsContatos = null,
        public ?string $numeroDocumento = null,
    ) {
        $this->criterio = $criterio instanceof Criterio ? $criterio->value : $criterio;

        $this->dataInclusaoInicial = $this->prepareStringOrDateParam($dataInclusaoInicial);
        $this->dataInclusaoFinal = $this->prepareStringOrDateParam($dataInclusaoFinal);
        $this->dataAlteracaoInicial = $this->prepareStringOrDateParam($dataAlteracaoInicial);
        $this->dataAlteracaoFinal = $this->prepareStringOrDateParam($dataAlteracaoFinal);

        $this->uf = $uf instanceof UF ? $uf->value : $uf;

        parent::__construct(objectToArray($this));
    }
}
