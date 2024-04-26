<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Enum;

/**
 * Enumerador de situação para filtro de vendedores.
 */
enum SituacaoFiltro: string
{
    case ATIVO = 'A';
    case INATIVO = 'I';
    case SEM_MOVIMENTO = 'S';
    case EXCLUIDO = 'E';
    case TODOS = 'T';
}
