<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Enum;

/**
 * Enumerador de situação de um contrato.
 */
enum Situacao: int
{
    case INATIVO = 0;
    case ATIVO = 1;
    case BAIXADO = 2;
    case ISENTO = 3;
    case EM_AVALIACAO = 4;
}