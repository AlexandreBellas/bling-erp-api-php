<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum;

/**
 * Enumerador de tipo de listagem de produto.
 */
enum TipoListagem: string
{
    case TODOS = 'T';
    case PRODUTOS = 'P';
    case SERVICOS = 'S';
    case COMPOSICOES = 'E';
    case PRODUTOS_SIMPLES = 'PS';
    case COM_VARIACOES = 'C';
    case VARIACOES = 'V';
}
