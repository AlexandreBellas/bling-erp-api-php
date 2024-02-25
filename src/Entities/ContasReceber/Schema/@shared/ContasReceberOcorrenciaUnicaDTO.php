<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Shared;

class ContasReceberOcorrenciaUnicaDTO {
    /**
     * Constrói o objeto.
     * 
     * @param int $tipo
     */
    public function __construct(
        public int $tipo
    ) {}
}