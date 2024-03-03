<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Enum;

/**
 * Enumerador de situação de um contato.
 */
enum Situacao: string
{
    case ATIVO = 'A';
    case EXCLUIDO = 'E';
    case INATIVO = 'I';
    case SEM_MOVIMENTACAO = 'S';
}