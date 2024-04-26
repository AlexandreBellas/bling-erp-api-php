<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum;

/**
 * Enumerador de tipo de produção de um produto.
 */
enum TipoProducao: string
{
    case PROPRIA = 'P';
    case TERCEIROS = 'T';
}
