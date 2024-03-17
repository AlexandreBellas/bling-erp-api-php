<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum;

/**
 * Enumerador de modalidade de base de cálculo do ICMS ST de uma natureza de operação.
 */
enum ModalidadeBaseCalculoICMSST: int
{
    /**
     * Margem Valor Agregado (%)
     */
    case MARGEM_VALOR_AGREGADO = 0;
    /**
     * Pauta (valor)
     */
    case PAUTA_VALOR = 1;
    /**
     * Preço Tabelado Máximo (valor)
     */
    case PRECO_TABELADO_MAXIMO = 2;
    /**
     * Valor da operação
     */
    case VALOR_DA_OPERACAO = 3;
}
