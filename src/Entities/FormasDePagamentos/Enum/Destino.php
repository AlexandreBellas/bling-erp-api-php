<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum;

/**
 * Enumerador de destino de uma forma de pagamento.
 */
enum Destino: int
{
    case CONTA_A_RECEBER_PAGAR = 1;
    case FICHA_FINANCEIRA = 2;
    case CAIXA_E_BANCOS = 3;
}