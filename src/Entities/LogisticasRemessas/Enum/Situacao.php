<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasRemessas\Enum;

/**
 * Enumerador de situação de uma remessa de postagem.
 */
enum Situacao: int
{
    case A_SER_PROCESSADA = -3;
    case EM_PROCESSAMENTO = -2;
    case CANCELADO = -1;
    case EM_ABERTO = 0;
    case EMITIDO = 1;
    case PRONTO_PARA_ENVIO = 2;
    case DESPACHADO = 3;
    case PRONTO_PARA_ENVIO_2 = 4;
    case ETIQUETA_COMPRADA = 5;
    case ETIQUETA_PARCIALMENTE_COMPRADA = 6;
}
