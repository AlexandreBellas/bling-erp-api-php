<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum;

/**
 * Enumerador de situação de uma forma de pagamento.
 */
enum Situacao: int
{
    case INATIVA = 0;
    case ATIVA = 1;
}