<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Enum;

/**
 * Enumerador de código fiscal da forma de pagamento de contas a receber.
 */
enum CodigoFiscal: int
{
    case DINHEIRO = 1;
    case CHEQUE = 2;
    case CARTAO_DE_CREDITO = 3;
    case CARTAO_DE_DEBITO = 4;
    case CREDITO_LOJA = 5;
    case VALE_ALIMENTACAO = 10;
    case VALE_REFEICAO = 11;
    case VALE_PRESENTE = 12;
    case VALE_COMBUSTIVEL = 13;
    case DUPLICATA_MERCANTIL = 14;
    case BOLETO_BANCARIO = 15;
    case DEPOSITO_BANCARIO = 16;
    case PIX = 17;
    case TRANSFERENCIA_BANCARIA = 18;
    case CARTAO_VIRTUAL = 19;
    case SEM_PAGAMENTO = 90;
    case OUTROS = 99;
}
