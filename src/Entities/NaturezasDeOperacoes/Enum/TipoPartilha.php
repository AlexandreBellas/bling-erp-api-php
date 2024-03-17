<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum;

/**
 * Enumerador de tipo de partilha de ICMS de uma natureza de operação.
 */
enum TipoPartilha: int
{
    case ISENTO = 0;
    case NORMAL = 1;
}
