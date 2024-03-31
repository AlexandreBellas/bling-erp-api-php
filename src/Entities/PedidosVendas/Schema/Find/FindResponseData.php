<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

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
     * @param ?FindResponseDataContato $contato
     * @param ?FindResponseDataSituacao $situacao
     * @param ?Id $loja
     * @param ?string $numeroPedidoCompra
     * @param ?float $outrasDespesas
     * @param ?string $observacoes
     * @param ?string $observacoesInternas
     * @param ?FindResponseDataDesconto $desconto
     * @param ?Id $categoria
     * @param ?Id $notaFiscal
     * @param ?FindResponseDataTributacao $tributacao
     * @param ?FindResponseDataItens[] $itens
     * @param ?FindResponseDataParcelas[] $parcelas
     * @param ?FindResponseDataTransporte $transporte
     * @param ?Id $vendedor
     * @param ?FindResponseDataIntermediador $intermediador
     * @param ?FindResponseDataTaxas $taxas
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
            'itens' => FindResponseDataItens::class,
            'parcelas' => FindResponseDataParcelas::class
        ];
    }
}
