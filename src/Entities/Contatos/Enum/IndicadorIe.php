<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Enum;

/**
 * Enumerador de indicador de inscrição estadual.
 */
enum IndicadorIe: int
{
    /**
     * Contribuinte ICMS
     */
    case CONTRIBUINTE_ICMS = 1;
    /**
     * Contribuinte isento de Inscrição no cadastro de Contribuintes
     */
    case CONTRIBUINTE_ISENTO = 2;
    /**
     * Não Contribuinte
     */
    case NAO_CONTRIBUINTE = 9;
}