<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Enum;

/**
 * Enumerador de situação de um objeto de logística.
 */
enum Situacao: int
{
    case POSTADO = 0;
    case EM_ANDAMENTO = 1;
    case NAO_ENTREGUE = 2;
    case ENTREGUE = 3;
    case AGUARDANDO_RETIRADA = 4;
    case EM_ABERTO = 5;
    case VINCULADO = 6;
    case ATRASADO = 7;
    case NAO_POSTADO = 8;
    case ENTREGA_SUSPENSA = 9;
}
