<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum;

/**
 * Enumerador de tipo de estoque de um produto.
 */
enum TipoEstoque: string
{
    case FISICO = 'F';
    case VIRTUAL = 'V';
}
