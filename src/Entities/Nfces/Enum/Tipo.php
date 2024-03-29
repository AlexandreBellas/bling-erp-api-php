<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Enum;

/**
 * Enumerador de tipo de uma NFC-e.
 */
enum Tipo: int
{
    case ENTRADA = 0;
    case SAIDA = 1;
}
