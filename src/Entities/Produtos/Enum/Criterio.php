<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Enum;

/**
 * Enumerador de critério de listagem de um produto.
 */
enum Criterio: int
{
    case ULTIMOS_INCLUIDOS = 1;
    case ATIVOS = 2;
    case INATIVOS = 3;
    case EXCLUIDOS = 4;
    case TODOS = 5;
}
