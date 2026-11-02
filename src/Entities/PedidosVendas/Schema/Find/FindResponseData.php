<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

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
     * @param ?string $numeroLoja
     * @param string $data
     * @param string $dataSaida
     * @param string $dataPrevista
     * @param ?float $totalProdutos
     * @param ?float $total
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataContato $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataSituacao $situacao
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $loja
     * @param ?string $numeroPedidoCompra
     * @param ?float $outrasDespesas
     * @param ?string $observacoes
     * @param ?string $observacoesInternas
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataDesconto $desconto
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $categoria
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $notaFiscal
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataTributacao $tributacao
     * @param ?array $itens
     * @param ?array $parcelas
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataTransporte $transporte
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $vendedor
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataIntermediador $intermediador
     * @param ?\AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find\FindResponseDataTaxas $taxas
     */
    public function __construct(
        public ?int $id,
        public ?int $numero,
        public ?string $numeroLoja,
        public string $data,
        public string $dataSaida,
        public string $dataPrevista,
        public ?float $totalProdutos,
        public ?float $total,
        public ?FindResponseDataContato $contato,
        public ?FindResponseDataSituacao $situacao,
        public ?Id $loja,
        public ?string $numeroPedidoCompra,
        public ?float $outrasDespesas,
        public ?string $observacoes,
        public ?string $observacoesInternas,
        public ?FindResponseDataDesconto $desconto,
        public ?Id $categoria,
        public ?Id $notaFiscal,
        public ?FindResponseDataTributacao $tributacao,
        public ?array $itens,
        public ?array $parcelas,
        public ?FindResponseDataTransporte $transporte,
        public ?Id $vendedor,
        public ?FindResponseDataIntermediador $intermediador,
        public ?FindResponseDataTaxas $taxas,
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
