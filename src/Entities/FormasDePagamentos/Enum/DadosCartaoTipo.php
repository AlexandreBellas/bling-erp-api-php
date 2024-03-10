<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum;

/**
 * Enumerador de tipo de dados de cartão de uma forma de pagamento.
 */
enum DadosCartaoTipo: int
{
    case TEF = 1;
    case POS = 2;
}