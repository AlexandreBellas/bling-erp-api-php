<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum\Situacao;
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
     * @param string $numeroPlp
     * @param \AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum\Situacao $situacao
     * @param string $descricao
     * @param string $dataCriacao
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $logistica
     * @param array $objetos
     */
    public function __construct(
        public int $id,
        public string $numeroPlp,
        public Situacao $situacao,
        public string $descricao,
        public string $dataCriacao,
        public Id $logistica,
        public array $objetos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "objetos" => FindResponseDataObjetos::class,
        ];
    }
}
