<?php

namespace AleBatistella\BlingErpApi\Entities\Produtos\Enum;

/**
 * Enumerador de formato de um produto.
 */
enum Formato: string
{
    case SIMPLES = 'S';
    case COM_VARIACOES = 'V';
    case COM_COMPOSICAO = 'E';
}
