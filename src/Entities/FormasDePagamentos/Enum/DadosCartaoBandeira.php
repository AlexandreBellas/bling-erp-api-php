<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum;

/**
 * Enumerador de bandeira dos dados de cartão de uma forma de pagamento.
 */
enum DadosCartaoBandeira: int
{
    case VISA = 1;
    case MASTERCARD = 2;
    case AMERICAN_EXPRESS = 3;
    case SOROCRED = 4;
    case DINERS_CLUB = 5;
    case ELO = 6;
    case HIPERCARD = 7;
    case AURA = 8;
    case CABAL = 9;
    case OUTROS = 99;
}