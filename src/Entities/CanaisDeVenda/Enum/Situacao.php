<?php

namespace AleBatistella\BlingErpApi\Entities\CanaisDeVenda\Enum;

/**
 * Enumerador da situação de um canal de venda.
 */
enum Situacao: int
{
    case HABILITADO = 1;
    case DESABILITADO = 2;
}
