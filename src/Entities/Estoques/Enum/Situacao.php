<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques\Enum;

/**
 * Enumerador de situação de um depósito.
 */
enum Situacao: int
{
    case INATIVO = 0;
    case ATIVO = 1;
}