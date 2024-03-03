<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Enum;

/**
 * Enumerador de tipo de vencimento de cobrança de contrato.
 */
enum CobrancaVencimentoTipo: int
{
    case MES_CORRENTE = 1;
    case MES_SEGUINTE = 2;
    case EM_DOIS_MESES = 3;
}