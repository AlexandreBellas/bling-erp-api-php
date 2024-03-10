<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum;

/**
 * Enumerador de finalidade de uma forma de pagamento.
 */
enum Finalidade: int
{
    case PAGAMENTOS = 1;
    case RECEBIMENTOS = 2;
    case PAGAMENTOS_E_RECEBIMENTOS = 3;
}