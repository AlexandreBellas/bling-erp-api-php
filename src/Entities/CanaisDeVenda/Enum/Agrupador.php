<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum;

/**
 * Enumerador de agrupador de um canal de venda.
 */
enum Agrupador: int
{
    case LOJA_VIRTUAL = 1;
    case HUB = 2;
    case MARKETPLACE = 3;
    case API = 4;
}
