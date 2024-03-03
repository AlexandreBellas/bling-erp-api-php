<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Enum;

/**
 * Enumerador de periodicidade de vencimento de cobrança de contrato.
 */
enum CobrancaVencimentoPeriodicidade: int
{
    case MENSAL = 1;
    case BIMESTRAL = 2;
    case TRIMESTRAL = 3;
    case SEMESTRAL = 4;
    case ANUAL = 5;
    case BIANUAL = 6;
    case TRIANUAL = 7;
}