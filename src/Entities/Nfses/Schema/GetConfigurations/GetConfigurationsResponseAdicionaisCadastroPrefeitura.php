<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseAdicionaisCadastroPrefeitura extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $login
     * @param ?string $senha
     */
    public function __construct(
        public ?string $login,
        public ?string $senha,
    ) {
    }
}
