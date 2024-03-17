<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasServicos\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $descricao
     * @param string $codigo
     * @param string[] $aliases
     * @param ?bool $ativo
     * @param float $freteItem
     * @param int $estimativaEntrega
     * @param ?string $idCodigoServico
     * @param Id $logistica
     * @param Id $transportador
     */
    public function __construct(
        public ?int $id,
        public string $descricao,
        public string $codigo,
        public array $aliases,
        public ?bool $ativo,
        public float $freteItem,
        public int $estimativaEntrega,
        public ?string $idCodigoServico,
        public Id $logistica,
        public Id $transportador,
    ) {
    }
}
