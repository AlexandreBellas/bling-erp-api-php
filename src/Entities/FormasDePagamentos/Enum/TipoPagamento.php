<?php

namespace AleBatistella\BlingErpApi\Entities\FormasDePagamentos\Enum;

/**
 * Enumerador de tipo de pagamento de uma forma de pagamento.
 */
enum TipoPagamento: int
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
    case TRANSFERENCIA_BANCARIA_CARTEIRA_DIGITAL = 18;
    case PROGRAMA_DE_FIDELIDADE_CASHBACK_CREDITO_VIRTUAL = 19;
    case SEM_PAGAMENTO = 90;
    case OUTROS = 99;
}