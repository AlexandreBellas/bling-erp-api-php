<?php

namespace AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\Enum;

/**
 * Enumerador de tipos de categorias - receitas e despesas.
 */
enum Tipo: int
{
    case TODAS = 0;
    case DESPESA = 1;
    case RECEITA = 2;
    case RECEITA_E_DESPESA = 3;
}