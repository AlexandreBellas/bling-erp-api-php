<?php

namespace AleBatistella\BlingErpApi\Entities\Vendedores\Enum;

/**
 * Enumerador de situação de um vendedor.
 */
enum Situacao: string
{
    case ATIVO = 'A';
    case INATIVO = 'I';
    case SEM_MOVIMENTO = 'S';
    case EXCLUIDO = 'E';
}
