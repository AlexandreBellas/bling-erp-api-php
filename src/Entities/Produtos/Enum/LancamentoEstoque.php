<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Enum;

/**
 * Enumerador de lançamento de estoque de um produto.
 */
enum LancamentoEstoque: string
{
    case PRODUTO_E_COMPONENTE = 'A';
    case COMPONENTE = 'M';
    case PRODUTO = 'P';
}
