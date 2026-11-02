<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\OptionalId;

/**
 * Resposta da busca de uma proposta comercial pelo ID.
 */
readonly final class FindResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $data
     * @param ?string $situacao
     * @param ?float $total
     * @param ?float $totalProdutos
     * @param ?int $numero
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\OptionalId $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\OptionalId $loja
     * @param ?float $desconto
     * @param ?float $outrasDespesas
     * @param ?int $garantia
     * @param ?string $dataProximoContato
     * @param ?string $observacoes
     * @param ?string $observacaoInterna
     * @param ?int $totalOutrosItens
     * @param ?string $aosCuidadosDe
     * @param ?string $introducao
     * @param ?string $prazoEntrega
     * @param ?array $itens
     * @param ?array $parcelas
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\OptionalId $vendedor
     * @param ?\AleBatistella\BlingErpApi\Entities\PropostasComerciais\Schema\Find\FindResponseDataTransporte $transporte
     */
    public function __construct(
        public ?int $id,
        public ?string $data,
        public ?string $situacao,
        public ?float $total,
        public ?float $totalProdutos,
        public ?int $numero,
        public ?OptionalId $contato,
        public ?OptionalId $loja,
        public ?float $desconto,
        public ?float $outrasDespesas,
        public ?int $garantia,
        public ?string $dataProximoContato,
        public ?string $observacoes,
        public ?string $observacaoInterna,
        public ?int $totalOutrosItens,
        public ?string $aosCuidadosDe,
        public ?string $introducao,
        public ?string $prazoEntrega,
        public ?array $itens,
        public ?array $parcelas,
        public ?OptionalId $vendedor,
        public ?FindResponseDataTransporte $transporte,
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "itens" => FindResponseDataItens::class,
            "parcelas" => FindResponseDataParcelas::class,
        ];
    }

    /**
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions $response
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        if (is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        return self::from($response->body->content);
    }
}
