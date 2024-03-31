<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosCompras\Enum;

/**
 * Enumerador de situação de um pedido de compra.
 */
enum Situacao: int
{
    case EM_ABERTO = 0;
    case ATENDIDO = 1;
    case CANCELADO = 2;
    case EM_ANDAMENTO  = 3;
}
