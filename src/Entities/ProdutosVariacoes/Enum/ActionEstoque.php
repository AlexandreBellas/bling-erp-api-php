<?php

namespace AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\Enum;

/**
 * Enumerador de _action estoque_ de um produto.
 */
enum ActionEstoque: string
{
    /**
     * Irá zerar os saldos de estoque.
     */
    case ZERAR = 'Z';
    /**
     * Transfere o estoque do produto pai para a primeira variação informada.
     */
    case TRANSFERIR = 'T';
}
