<?php

namespace AleBatistella\BlingErpApi\Entities\Logisticas\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados da resposta.
 */
readonly final class FindResponseDataServicos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $descricao
     * @param float $freteItem
     * @param int $estimativaEntrega
     * @param string $codigo
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $logistica
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $transportador
     * @param array $aliases
     */
    public function __construct(
        public int $id,
        public string $descricao,
        public float $freteItem,
        public int $estimativaEntrega,
        public string $codigo,
        public Id $logistica,
        public Id $transportador,
        public array $aliases,
    ) {
    }
}
