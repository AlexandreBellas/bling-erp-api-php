<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Enum;

/**
 * Enumerador de situação de uma NFC-e.
 */
enum Situacao: int
{
    case PENDENTE = 1;
    case CANCELADA = 2;
    case AGUARDANDO_RECIBO = 3;
    case REJEITADA = 4;
    case AUTORIZADA = 5;
    case EMITIDA_DANFE = 6;
    case REGISTRADA = 7;
    case AGUARDANDO_PROTOCOLO = 8;
    case DENEGADA = 9;
    case CONSULTA_SITUACAO = 10;
    case BLOQUEADA = 11;
}
