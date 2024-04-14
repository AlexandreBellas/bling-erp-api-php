<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum\Criterio;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum\TipoListagem;

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
    ) {
        $this->criterio =  $criterio instanceof Criterio ? $criterio->value : $criterio;
        $this->tipo =  $tipo instanceof TipoListagem ? $tipo->value : $tipo;

        $this->dataInclusaoInicial = $this->prepareStringOrDateParam($dataInclusaoInicial);
        $this->dataInclusaoFinal = $this->prepareStringOrDateParam($dataInclusaoFinal);
        $this->dataAlteracaoInicial = $this->prepareStringOrDateParam($dataAlteracaoInicial);
        $this->dataAlteracaoFinal = $this->prepareStringOrDateParam($dataAlteracaoFinal);

        parent::__construct(objectToArray($this));
    }
}
