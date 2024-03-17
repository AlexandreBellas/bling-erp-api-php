<?php

namespace AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\Enum;

/**
 * Enumerador de motivo de desoneração do ICMS de uma natureza de operação.
 */
enum MotivoDesoneracaoICMS: int
{
    case NENHUM = 0;
    case TAXI = 1;
    case PRODUTOR_AGROPECUARIO = 3;
    case FROTISTA_LOCADORA = 4;
    case DIPLOMATICO_CONSULTAR = 5;
    case UTILITARIOS_E_MOTOCICLETAS_AMAZONIA_OCIDENTAL = 6;
    case SUFRAMA = 7;
    case VENDA_A_ORGAO_PUBLICO = 8;
    case OUTROS = 9;
    case DEFICIENTE_CONDUTOR = 10;
    case DEFICIENTE_NAO_CONDUTOR = 11;
    case SOLICITADO_PELO_FISCO  = 90;
}
