<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Enum;

/**
 * Enumerador de situação de uma conta a receber.
 */
enum Situacao: int
{
    case EM_ABERTO = 1;
    case RECEBIDO = 2;
    case PARCIALMENTE_RECEBIDO = 3;
    case DEVOLVIDO = 4;
    case CANCELADO = 5;
    case PARCIALMENTE_DEVOLVIDO = 6;
    case CONFIRMADO = 7;
}