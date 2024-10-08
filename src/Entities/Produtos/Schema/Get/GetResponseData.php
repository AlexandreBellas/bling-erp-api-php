<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Produtos\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\Produtos\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Produtos\Enum\Formato;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?int $idProdutoPai
     * @param string $nome
     * @param ?string $codigo
     * @param ?float $preco
     * @param ?float $precoCusto
     * @param ?GetResponseDataEstoque $estoque
     * @param Tipo $tipo
     * @param Situacao $situacao
     * @param Formato $formato
     * @param ?string $descricaoCurta
     * @param ?string $imagemURL
     */
    public function __construct(
        public ?int $id,
        public ?int $idProdutoPai,
        public string $nome,
        public ?string $codigo,
        public ?float $preco,
        public ?float $precoCusto,
        public ?GetResponseDataEstoque $estoque,
        public Tipo $tipo,
        public Situacao $situacao,
        public Formato $formato,
        public ?string $descricaoCurta,
        public ?string $imagemURL,
    ) {}
}
