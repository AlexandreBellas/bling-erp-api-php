<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasObjetos\Enum;

/**
 * Enumerador de tipo de integração de uma logística.
 */
enum TipoIntegracao: string
{
    case AmazonDBA = "AmazonDBA";
    case B2WEntrega = "B2WEntrega";
    case B2WO2O = "B2WO2O";
    case Correios = "Correios";
    case CorreiosLog = "CorreiosLog";
    case CustomLogistic = "CustomLogistic";
    case DafitiMilkrun = "DafitiMilkrun";
    case Envvias = "Envvias";
    case Frenet = "Frenet";
    case FreteDescomplicado = "FreteDescomplicado";
    case Intelipost = "Intelipost";
    case Jadlog = "Jadlog";
    case Jamef = "Jamef";
    case Kangu = "Kangu";
    case LogisticaAliExpress = "LogisticaAliExpress";
    case LogisticaShopee = "LogisticaShopee";
    case Loggi = "Loggi";
    case MagaluEntregas = "MagaluEntregas";
    case Mandae = "Mandae";
    case MelhorEnvio = "MelhorEnvio";
    case MercadoEnvios = "MercadoEnvios";
    case OlistFulfillment = "OlistFulfillment";
    case TotalExpress = "TotalExpress";
}
