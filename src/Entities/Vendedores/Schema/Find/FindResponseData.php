<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?float $descontoLimite
     * @param Id $loja
     * @param FindResponseDataContato $contato
     * @param FindResponseDataComissoes[] $comissoes
     */
    public function __construct(
        public ?int $id,
        public ?float $descontoLimite,
        public Id $loja,
        public FindResponseDataContato $contato,
        public array $comissoes,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'comissoes' => FindResponseDataComissoes::class
        ];
    }
}
