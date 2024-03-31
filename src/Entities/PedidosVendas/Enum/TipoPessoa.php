<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Enum;

/**
 * Enumerador de tipo de pessoa de um pedido de venda.
 */
enum TipoPessoa: string
{
    case FISICA = 'F';
    case JURIDICA = 'J';
    case ESTRANGEIRA = 'E';
}
