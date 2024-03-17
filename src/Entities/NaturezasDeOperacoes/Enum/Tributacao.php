<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum;

/**
 * Enumerador de tributação de uma natureza de operação.
 */
enum Tributacao: int
{
    case TRIBUTADO = 1;
    case ISENTO = 2;
    case OUTRA_SITUACAO = 3;
}
