<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Enum;

/**
 * Enumerador de situações de categorias - receitas e despesas.
 */
enum Situacao: int
{
    case ATIVAS_E_INATIVAS = 0;
    case ATIVAS = 1;
    case INATIVAS = 2;
}