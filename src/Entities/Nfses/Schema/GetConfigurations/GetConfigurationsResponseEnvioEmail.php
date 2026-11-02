<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseEnvioEmail extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?bool $enviarBoletoRPS
     * @param ?string $remetente
     * @param ?string $assunto
     * @param ?string $mensagem
     * @param ?\AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations\GetConfigurationsResponseEnvioEmailPadrao $padrao
     */
    public function __construct(
        public ?bool $enviarBoletoRPS,
        public ?string $remetente,
        public ?string $assunto,
        public ?string $mensagem,
        public ?GetConfigurationsResponseEnvioEmailPadrao $padrao,
    ) {
    }
}
