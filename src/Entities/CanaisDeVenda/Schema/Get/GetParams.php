<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\QueryParams;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum\Agrupador;

/**
 * Parâmetros da busca de canais de venda paginados.
 */
readonly final class GetParams extends QueryParams
{
    public ?int $situacao;
    public ?int $agrupador;

    /**
     * Constrói o objeto.
     * 
     * @param ?int $pagina N° da página da listagem
     * @param ?int $limite Quantidade de registros que devem ser exibidos por página
     * @param ?string[] $tipos Parâmetro para filtrar os registros através de uma lista de tipos de canal de venda
     * @param Situacao|int|null $situacao Parâmetro para filtrar os registros através da situação
     * @param Agrupador|int|null $agrupador Agrupador do canal de venda
     */
    public function __construct(
        public ?int $pagina = null,
        public ?int $limite = null,
        public ?array $tipos = null,
        Situacao|int|null $situacao = null,
        Agrupador|int|null $agrupador = null,
    ) {
        $this->situacao = ($situacao instanceof Situacao) ? $situacao->value : $situacao;
        $this->agrupador = ($agrupador instanceof Agrupador) ? $agrupador->value : $agrupador;

        parent::__construct(objectToArray($this));
    }
}
