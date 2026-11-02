<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum;

/**
 * Enumerador de unidade do desconto de um pedido de venda.
 */
enum DescontoUnidade: string
{
    case REAL = "REAL";
    case PERCENTUAL = "PERCENTUAL";
}
