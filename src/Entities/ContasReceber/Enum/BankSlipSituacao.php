<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Enum;

/**
 * Enumerador de situação de boletos de contas a receber.
 */
enum BankSlipSituacao: string
{
    case EM_ABERTO = 'aberto';
    case CONFIRMADO = 'confirmado';
    case PARCIALMENTE_RECEBIDO = 'pacial';
    case DEVOLVIDO = 'devolvido';
    case PARCIALMENTE_DEVOLVIDO = 'devolvidoP';
    case RECEBIDO = 'pago';
    case CANCELADO = 'cancelada';
}