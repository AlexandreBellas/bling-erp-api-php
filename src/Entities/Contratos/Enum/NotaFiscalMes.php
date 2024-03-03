<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Enum;

/**
 * Enumerador de mês de nota fiscal.
 */
enum NotaFiscalMes: int
{
    case NAO_IMPRIME = 1;
    case MES_ATUAL = 2;
    case MES_ANTERIOR = 3;
}