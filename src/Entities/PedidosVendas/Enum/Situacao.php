<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum;

/**
 * Enumerador de situação de um pedido de venda.
 */
enum Situacao: int
{
    case EM_ABERTO = 0;
    case ATENDIDO = 1;
    case CANCELADO = 2;
    case EM_ANDAMENTO  = 3;
}
