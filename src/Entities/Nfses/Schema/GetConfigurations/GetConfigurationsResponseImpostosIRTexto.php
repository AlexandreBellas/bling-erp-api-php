<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseImpostosIRTexto extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $padrao
     * @param ?string $isento
     */
    public function __construct(
        public ?string $padrao,
        public ?string $isento,
    ) {
    }
}
