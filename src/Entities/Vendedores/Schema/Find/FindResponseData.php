<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Find;

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
     * @param ?float $descontoLimite
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $loja
     * @param \AleBatistella\BlingErpApi\Entities\Vendedores\Schema\Find\FindResponseDataContato $contato
     * @param array $comissoes
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
            "comissoes" => FindResponseDataComissoes::class
        ];
    }
}
