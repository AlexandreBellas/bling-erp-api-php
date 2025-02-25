<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseDataMidiaImagensInternas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $linkMiniatura
     * @param string $validade
     * @param ?int $ordem
     * @param Id $anexo
     * @param Id $anexoVinculo
     */
    public function __construct(
        public string $linkMiniatura,
        public string $validade,
        public ?int $ordem,
        public ?Id $anexo,
        public ?Id $anexoVinculo,
    ) {}
}
