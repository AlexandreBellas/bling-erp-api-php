<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class GetConfigurationsResponseControleNumeracaoRPS extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $cnpjEmitente
     * @param ?int $id
     * @param ?int $numero
     * @param ?int $serie
     */
    public function __construct(
        public ?string $cnpjEmitente,
        public ?int $id,
        public ?int $numero,
        public ?int $serie,
    ) {
    }
}
