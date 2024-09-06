<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da busca de um ordem de produção pelo ID.
 */
readonly final class FindResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param ?string $dataPrevisaoInicio
     * @param ?string $dataPrevisaoFinal
     * @param ?string $dataInicio
     * @param ?string $dataFim
     * @param int $numero
     * @param ?string $responsavel
     * @param FindResponseDeposito $deposito
     * @param FindResponseSituacao $situacao
     * @param ?FindResponseVendas[] $vendas
     * @param ?FindResponseItens[] $itens
     * @param ?string $observacoes
     */
    public function __construct(
        public ?int $id,
        public ?string $dataPrevisaoInicio,
        public ?string $dataPrevisaoFinal,
        public ?string $dataInicio,
        public ?string $dataFim,
        public int $numero,
        public ?string $responsavel,
        public FindResponseDeposito $deposito,
        public FindResponseSituacao $situacao,
        public ?array $vendas,
        public ?array $itens,
        public ?string $observacoes,
    ) {}

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "vendas" => FindResponseVendas::class,
            "itens" => FindResponseItens::class,
        ];
    }

    /**
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
