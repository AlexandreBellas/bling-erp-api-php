<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Enum;

/**
 * Enumerador da unidade do desconto de um pedido de compra.
 */
enum DescontoUnidade: string
{
    case REAL = 'REAL';
    case PERCENTUAL = 'PERCENTUAL';
}
