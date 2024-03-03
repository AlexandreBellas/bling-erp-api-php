<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Enum;

/**
 * Enumerador de geração de nota fiscal.
 */
enum NotaFiscalGerar: int
{
    case NAO = 1;
    case AO_GERAR_COBRANCA = 2;
}