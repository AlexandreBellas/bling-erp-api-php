<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum\Situacao;

/**
 * Dados da resposta.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $descricao
     * @param ?string $tipo
     * @param ?\AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum\Situacao $situacao
     * @param ?array $filiais
     */
    public function __construct(
        public ?int $id,
        public ?string $descricao,
        public ?string $tipo,
        public ?Situacao $situacao,
        public ?array $filiais,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "filiais" => FindResponseDataFiliais::class
        ];
    }
}
