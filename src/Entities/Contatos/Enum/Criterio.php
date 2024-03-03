<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Enum;

/**
 * Enumerador de critério de busca de contatos.
 */
enum Criterio: int
{
    case TODOS = 1;
    case EXCLUIDOS = 2;
    case ULTIMOS_INCLUIDOS = 3;
    case SEM_MOVIMENTO = 4;
}