<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Shared;

class ContasReceberOcorrenciaSemanalDTO {
    /**
     * Constrói o objeto.
     * 
     * @param int $tipo
     * @param ?bool $considerarDiasUteis
     * @param int $diaSemanaVencimento
     * @param ?string $dataLimite
     */
    public function __construct(
        public int $tipo,
        public ?bool $considerarDiasUteis,
        public int $diaSemanaVencimento,
        public ?string $dataLimite
    ) {}
}