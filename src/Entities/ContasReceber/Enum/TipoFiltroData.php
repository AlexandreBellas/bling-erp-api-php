<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Enum;

/**
 * Enumerador de campo considerado ao filtrar por data
 * inicial e final de contas a receber.
 */
enum TipoFiltroData: string
{
    case DATA_DE_EMISSAO = "E";
    case DATA_DE_VENCIMENTO = "V";
    case DATA_DE_RECEBIMENTO = "R";
}
