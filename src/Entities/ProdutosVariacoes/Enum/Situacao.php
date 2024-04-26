<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum;

/**
 * Enumerador de situação de um produto.
 */
enum Situacao: string
{
    case ATIVO = 'A';
    case INATIVO = 'I';
}
