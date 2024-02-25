<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Shared;

class ContasReceberOcorrenciaParceladaDTO {
    /**
     * Constrói o objeto.
     * 
     * @param int $tipo
     * @param ?bool $considerarDiasUteis
     * @param int $diaVencimento
     * @param ?int $numeroParcelas
     */
    public function __construct(
        public int $tipo,
        public ?bool $considerarDiasUteis,
        public int $diaVencimento,
        public ?int $numeroParcelas
    ) {}
}