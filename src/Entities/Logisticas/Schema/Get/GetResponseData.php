<?php

namespace AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Logisticas\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $descricao
     * @param string $tipoIntegracao
     * @param bool $integracaoNativa
     * @param Situacao $situacao
     * @param Id $integracao
     * @param Id[] $servicos
     */
    public function __construct(
        public int $id,
        public string $descricao,
        public string $tipoIntegracao,
        public bool $integracaoNativa,
        public Situacao $situacao,
        public Id $integracao,
        public array $servicos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'servicos' => Id::class,
        ];
    }
}
