<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\Produtos\Enum\Criterio;
use AleBatistella\BlingErpApi\Entities\Produtos\Enum\TipoListagem;

/**
 * Parâmetros da busca de produtos paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $criterio;
    public ?string $tipo;
    public ?string $dataInclusaoInicial;
    public ?string $dataInclusaoFinal;
    public ?string $dataAlteracaoInicial;
    public ?string $dataAlteracaoFinal;

    /**
     * Constrói o objeto.
     *
     * @param ?int $pagina
     * @param ?int $limite
     * @param Criterio|int|null $criterio
     * @param TipoListagem|int|null $tipo
     * @param ?int $idComponente
     * @param \DateTimeInterface|string|null $dataInclusaoInicial
     * @param \DateTimeInterface|string|null $dataInclusaoFinal
     * @param \DateTimeInterface|string|null $dataAlteracaoInicial
     * @param \DateTimeInterface|string|null $dataAlteracaoFinal
     * @param ?int $idCategoria
     * @param ?int $idLoja
     * @param ?string $codigo
     * @param ?string $nome
     * @param ?int[] $idsProdutos
     * @param ?string[] $codigos
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        Criterio|int|null $criterio = null,
        TipoListagem|int|null $tipo = null,
        \DateTimeInterface|string|null $dataInclusaoInicial = null,
        \DateTimeInterface|string|null $dataInclusaoFinal = null,
        \DateTimeInterface|string|null $dataAlteracaoInicial = null,
        \DateTimeInterface|string|null $dataAlteracaoFinal = null,
        public ?int $idCategoria = null,
        public ?int $idLoja = null,
        public ?string $codigo = null,
        public ?string $nome = null,
        public ?array $idsProdutos = null,
        public ?array $codigos = null,
    ) {
        $this->criterio =  $criterio instanceof Criterio ? $criterio->value : $criterio;
        $this->tipo =  $tipo instanceof TipoListagem ? $tipo->value : $tipo;

        $this->dataInclusaoInicial = $this->prepareStringOrDateParam($dataInclusaoInicial, shouldIncludeTime: true);
        $this->dataInclusaoFinal = $this->prepareStringOrDateParam($dataInclusaoFinal, shouldIncludeTime: true);
        $this->dataAlteracaoInicial = $this->prepareStringOrDateParam($dataAlteracaoInicial, shouldIncludeTime: true);
        $this->dataAlteracaoFinal = $this->prepareStringOrDateParam($dataAlteracaoFinal, shouldIncludeTime: true);

        parent::__construct(objectToArray($this));
    }
}
