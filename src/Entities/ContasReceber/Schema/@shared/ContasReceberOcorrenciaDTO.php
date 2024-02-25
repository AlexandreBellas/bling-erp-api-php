<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Shared;

class ContasReceberOcorrenciaDTO {
    /**
     * Constrói o objeto.
     * 
     * @param int $tipo
     * @param ?bool $considerarDiasUteis
     * @param int $diaVencimento
     * @param ?string $dataLimite
     */
    public function __construct(
        public int $tipo,
        public ?bool $considerarDiasUteis,
        public int $diaVencimento,
        public ?string $dataLimite
    ) {}
}