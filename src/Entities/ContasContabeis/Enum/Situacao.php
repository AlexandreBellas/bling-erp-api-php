<?php

namespace AleBatistella\BlingErpApi\Entities\ContasContabeis\Enum;

/**
 * Enumerador de situação de uma conta contábil.
 */
enum Situacao: int
{
    case ATIVO = 1;
    case INATIVO = 2;
    case PENDENTE = 3;
    case CANCELADA = 4;
}