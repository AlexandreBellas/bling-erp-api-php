<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Tipo;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Formato;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\TipoProducao;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Condicao;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\ActionEstoque;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataVariacoes extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $nome
     * @param ?string $codigo
     * @param ?float $preco
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Tipo $tipo
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Situacao $situacao
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Formato $formato
     * @param ?string $descricaoCurta
     * @param ?string $imagemURL
     * @param ?string $dataValidade
     * @param ?string $unidade
     * @param ?float $pesoLiquido
     * @param ?float $pesoBruto
     * @param ?int $volumes
     * @param ?float $itensPorCaixa
     * @param ?string $gtin
     * @param ?string $gtinEmbalagem
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\TipoProducao $tipoProducao
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\Condicao $condicao
     * @param ?bool $freteGratis
     * @param ?string $marca
     * @param ?string $descricaoComplementar
     * @param ?string $linkExterno
     * @param ?string $observacoes
     * @param ?string $descricaoEmbalagemDiscreta
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $categoria
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataEstoque $estoque
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataFornecedor $fornecedor
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum\ActionEstoque $actionEstoque
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataDimensoes $dimensoes
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataTributacao $tributacao
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataMidia $midia
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $linhaProduto
     * @param ?\AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataEstrutura $estrutura
     * @param ?array $camposCustomizados
     * @param \AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Schema\Find\FindResponseDataVariacoesVariacao $variacao
     */
    public function __construct(
        public ?int $id,
        public string $nome,
        public ?string $codigo,
        public ?float $preco,
        public Tipo $tipo,
        public Situacao $situacao,
        public Formato $formato,
        public ?string $descricaoCurta,
        public ?string $imagemURL,
        public ?string $dataValidade,
        public ?string $unidade,
        public ?float $pesoLiquido,
        public ?float $pesoBruto,
        public ?int $volumes,
        public ?float $itensPorCaixa,
        public ?string $gtin,
        public ?string $gtinEmbalagem,
        public ?TipoProducao $tipoProducao,
        public ?Condicao $condicao,
        public ?bool $freteGratis,
        public ?string $marca,
        public ?string $descricaoComplementar,
        public ?string $linkExterno,
        public ?string $observacoes,
        public ?string $descricaoEmbalagemDiscreta,
        public ?Id $categoria,
        public ?FindResponseDataEstoque $estoque,
        public ?FindResponseDataFornecedor $fornecedor,
        public ?ActionEstoque $actionEstoque,
        public ?FindResponseDataDimensoes $dimensoes,
        public ?FindResponseDataTributacao $tributacao,
        public ?FindResponseDataMidia $midia,
        public ?Id $linhaProduto,
        public ?FindResponseDataEstrutura $estrutura,
        public ?array $camposCustomizados,
        public FindResponseDataVariacoesVariacao $variacao,
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "camposCustomizados" => FindResponseDataCamposCustomizados::class,
        ];
    }
}
