<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\Enum;

/**
 * Enumerador de tipo de pessoa (física, jurídica ou estrangeira).
 */
enum TipoPessoa: string
{
    case FISICA = 'F';
    case JURIDICA = 'J';
    case ESTRANGEIRA = 'E';
}