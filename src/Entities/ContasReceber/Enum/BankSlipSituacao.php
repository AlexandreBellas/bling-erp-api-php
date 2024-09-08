<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Enum;

/**
 * Enumerador de situação de boletos de contas a receber.
 */
enum BankSlipSituacao: int
{
    case EM_ABERTO = 1;
    case RECEBIDO = 2;
    case PARCIALMENTE_RECEBIDO = 3;
    case DEVOLVIDO = 4;
    case PARCIALMENTE_DEVOLVIDO = 5;
    case CANCELADO = 6;
}
