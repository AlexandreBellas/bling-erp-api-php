<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum;

/**
 * Enumerador de lançamento de estoque de uma estrutura de produto.
 */
enum LancamentoEstoque: string
{
    case PRODUTO_E_COMPONENTE = 'A';
    case COMPONENTE = 'M';
    case PRODUTO = 'P';
}
