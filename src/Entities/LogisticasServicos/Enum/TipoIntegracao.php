<?php

namespace AleBatistella\BlingErpApi\Entities\LogisticasServicos\Enum;

/**
 * Enumerador de tipo de integração de um serviço de logística.
 */
enum TipoIntegracao: string
{
    case AMAZON_DBA = "AmazonDBA";
    case B2W_ENTREGA = "B2WEntrega";
    case B2WO2O = "B2WO2O";
    case CORREIOS = "Correios";
    case CORREIOS_LOG = "CorreiosLog";
    case CUSTOM_LOGISTIC = "CustomLogistic";
    case DAFITI_MILKRUN = "DafitiMilkrun";
    case ENVVIAS = "Envvias";
    case FRENET = "Frenet";
    case FRETE_DESCOMPLICADO = "FreteDescomplicado";
    case INTELIPOST = "Intelipost";
    case JADLOG = "Jadlog";
    case JAMEF = "Jamef";
    case KANGU = "Kangu";
    case LOGISTICA_ALI_EXPRESS = "LogisticaAliExpress";
    case LOGISTICA_SHOPEE = "LogisticaShopee";
    case LOGGI = "Loggi";
    case MAGALU_ENTREGAS = "MagaluEntregas";
    case MANDAE = "Mandae";
    case MELHOR_ENVIO = "MelhorEnvio";
    case MERCADO_ENVIOS = "MercadoEnvios";
    case OLIST_FULFILLMENT = "OlistFulfillment";
    case TOTAL_EXPRESS = "TotalExpress";
}
