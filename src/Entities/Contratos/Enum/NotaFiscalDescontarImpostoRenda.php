<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Enum;

/**
 * Enumerador de descontar imposto de renda de nota fiscal.
 * 
 * Reter o IR e descontar do total da NFS-e caso ultrapasse R$ 10,00.
 */
enum NotaFiscalDescontarImpostoRenda: int
{
    case SIM = 1;
    case NAO = 2;
    /**
     * Utilizar padrão da configuração da NFS-e
     */
    case PADRAO_NFSE = 3;
}