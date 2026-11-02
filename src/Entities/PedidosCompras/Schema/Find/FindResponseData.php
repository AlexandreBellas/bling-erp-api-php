<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?int $numero
     * @param ?string $data
     * @param ?string $dataPrevista
     * @param ?float $totalProdutos
     * @param ?float $total
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $fornecedor
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find\FindResponseDataSituacao $situacao
     * @param ?string $ordemCompra
     * @param ?string $observacoes
     * @param ?string $observacoesInternas
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find\FindResponseDataDesconto $desconto
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $categoria
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find\FindResponseDataTributacao $tributacao
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosCompras\Schema\Find\FindResponseDataTransporte $transporte
     * @param ?array $itens
     * @param ?array $parcelas
     */
    public function __construct(
        public ?int $id,
        public ?int $numero,
        public ?string $data,
        public ?string $dataPrevista,
        public ?float $totalProdutos,
        public ?float $total,
        public ?Id $fornecedor,
        public ?FindResponseDataSituacao $situacao,
        public ?string $ordemCompra,
        public ?string $observacoes,
        public ?string $observacoesInternas,
        public ?FindResponseDataDesconto $desconto,
        public ?Id $categoria,
        public ?FindResponseDataTributacao $tributacao,
        public ?FindResponseDataTransporte $transporte,
        public ?array $itens,
        public ?array $parcelas,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "itens" => FindResponseDataItens::class,
            "parcelas" => FindResponseDataParcelas::class
        ];
    }
}
