<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Schema\GetConfigurations;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetConfigurationsResponseISS extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?bool $zerar
     * @param ?bool $reter
     * @param ?bool $descontar
     * @param array $tributos
     */
    public function __construct(
        public ?bool $zerar,
        public ?bool $reter,
        public ?bool $descontar,
        public array $tributos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            "tributos" => GetConfigurationsResponseISSTributos::class
        ];
    }
}
