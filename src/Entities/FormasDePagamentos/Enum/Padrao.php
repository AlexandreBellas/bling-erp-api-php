<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum;

/**
 * Enumerador de padrão de uma forma de pagamento.
 */
enum Padrao: int
{
    case NAO = 0;
    case PADRAO = 1;
    case PADRAO_DEVOLUCAO = 2;
}