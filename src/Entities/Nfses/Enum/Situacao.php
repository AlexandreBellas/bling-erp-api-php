<?php

namespace AleBatistella\BlingErpApi\Entities\Nfses\Enum;

/**
 * Enumerador de situação de uma NFS-e.
 */
enum Situacao: int
{
    case PENDENTE = 0;
    case EMITIDA = 1;
    case DISPONIVEL_PARA_CONSULTA = 2;
    case CANCELADA = 3;
}
