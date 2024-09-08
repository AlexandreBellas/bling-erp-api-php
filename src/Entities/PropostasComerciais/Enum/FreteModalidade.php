<?php

namespace AleBatistella\BlingErpApi\Entities\PropostasComerciais\Enum;

/**
 * Enumerador de modalidade de frete do transporte de uma proposta comercial.
 */
enum FreteModalidade: int
{
    /**
     * Contratação do Frete por conta do Remetente (CIF).
     */
    case CIF = 0;
    /**
     * Contratação do Frete por conta do Destinatário (FOB).
     */
    case FOB = 1;
    /**
     * Contratação do Frete por conta de Terceiros.
     */
    case TERCEIROS = 2;
    /**
     * Transporte Próprio por conta do Remetente.
     */
    case PROPRIO_REMETENTE = 3;
    /**
     * Transporte Próprio por conta do Destinatário.
     */
    case PROPRIO_DESTINATARIO = 4;
    /**
     * Sem Ocorrência de Transporte.
     */
    case SEM_OCORRENCIA = 9;
}
