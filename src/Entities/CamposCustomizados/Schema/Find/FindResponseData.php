<?php

namespace AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Find;

use AleBatistella\BlingErpApi\Entities\CamposCustomizados\Enum\Situacao;
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
     * @param int $id
     * @param string $nome
     * @param ?\AleBatistella\BlingErpApi\Entities\CamposCustomizados\Enum\Situacao $situacao
     * @param ?string $placeholder
     * @param ?bool $obrigatorio
     * @param ?array $opcoes
     * @param ?\AleBatistella\BlingErpApi\Entities\CamposCustomizados\Schema\Find\FindResponseDataTamanho $tamanho
     * @param ?array $agrupadores
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $modulo
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $tipoCampo
     */
    public function __construct(
        public int $id,
        public string $nome,
        public ?Situacao $situacao,
        public ?string $placeholder,
        public ?bool $obrigatorio,
        public ?array $opcoes,
        public ?FindResponseDataTamanho $tamanho,
        public ?array $agrupadores,
        public Id $modulo,
        public Id $tipoCampo,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "opcoes"      => FindResponseDataOpcoes::class,
            "agrupadores" => Id::class,
        ];
    }
}
