<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\Enum;

/**
 * Enumerador de tipo de estoque de uma estrutura de produto.
 */
enum TipoEstoque: string
{
    case FISICO = 'F';
    case VIRTUAL = 'V';
}
