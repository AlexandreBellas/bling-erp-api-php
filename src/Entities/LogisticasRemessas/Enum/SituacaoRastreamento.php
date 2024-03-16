<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum;

/**
 * Enumerador de situação de rastreamento de uma remessa de postagem.
 */
enum SituacaoRastreamento: int
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
