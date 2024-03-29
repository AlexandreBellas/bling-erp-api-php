<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Enum;

/**
 * Enumerador de tipo de uma NF-e.
 */
enum Tipo: int
{
    case ENTRADA = 0;
    case SAIDA = 1;
}
