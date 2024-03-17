<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum;

/**
 * Enumerador de padrão de uma natureza de operação.
 */
enum Padrao: int
{
    case SEM_PADRAO = 0;
    case PADRAO_VENDA = 1;
    case PADRAO_COMPRA = 2;
    case PADRAO_VENDA_FISICA = 3;
    case PADRAO_VENDA_JURIDICA = 4;
    case PADRAO_COMPRA_FISICA = 5;
    case PADRAO_COMPRA_JURIDICA = 6;
    case PADRAO_VENDA_CUPOM = 7;
    case PADRAO_DEVOLUCAO_ENTRADA = 8;
    case PADRAO_DEVOLUCAO_SAIDA = 9;
}
