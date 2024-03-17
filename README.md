- [Versão em JS/TS](https://github.com/AlexandreBellas/bling-erp-api-js)
- Versão em C# (em breve)

# Bling ERP API - PHP

Pacote de integração com a [API v3 do ERP Bling](https://developer.bling.com.br)
para PHP 8.2+. O mais completo existente (e se não é, será).

Atualizado com a versão `v295` da API ([veja o registro de alterações](https://developer.bling.com.br/changelogs#2024-02-28)).

## Instalação

Para instalar, execute o comando:

```bash
composer require alebatistella/bling-erp-api
```

## Criação de uma nova conexão

Para criar uma conexão ao serviço do Bling, basta instanciar o objeto com a [API key](https://developer.bling.com.br/autenticacao) em seu construtor.

```php
use AleBatistella\BlingErpApi\Bling;

$apiKey = "sua_api_key";
$blingConnection = new Bling($apiKey);
```

Vale destacar que o fluxo de criação e autorização do aplicativo **não é feito
pela biblioteca**. Ou seja, a biblioteca somente recebe o `access_token` gerado
a partir do _endpoint_ `/token`. [Veja a referência](https://developer.bling.com.br/aplicativos#tokens-de-acesso).

## Entidades disponíveis

Nem todas as entidades do Bling estão permitidas para interação. As atuais são:

- [x] Borderos (`->borderos`)
- [x] Campos customizados (`->camposCustomizados`)
- [x] Categorias - Lojas (`->categoriasLojas`)
- [x] Categorias - Produtos (`->categoriasProdutos`)
- [x] Categorias - Receitas e Despesas (`->categoriasReceitasDespesas`)
- [x] Contas a Pagar (`->contasPagar`)
- [x] Contas a Receber (`->contasReceber`)
- [x] Contas Contábeis (`->contasContabeis`)
- [x] Contatos (`->contatos`)
- [x] Contatos - Tipos (`->contatosTipos`)
- [x] Contratos (`->contratos`)
- [x] Depósitos (`->depositos`)
- [x] Empresas (`->empresas`)
- [x] Estoques (`->estoques`)
- [x] Formas de pagamento (`->formasDePagamento`)
- [x] Homologação (`->homologacao`)
- [x] Logísticas (`->logisticas`)
- [x] Logísticas - Etiquetas (`->logisticasEtiquetas`)
- [x] Logísticas - Objetos (`->logisticasObjetos`)
- [x] Logísticas - Remessas (`->logisticasRemessas`)
- [x] Logísticas - Serviços (`->logisticasServicos`)
- [ ] Naturezas de Operações (`->naturezasDeOperacoes`)
- [ ] Notas Fiscais de Consumidor Eletrônicas (`->nfces`)
- [ ] Notas Fiscais de Serviço Eletrônicas (`->nfses`)
- [ ] Notas Fiscais Eletrônicas (`->nfes`)
- [ ] Notificações (`->notificacoes`)
- [ ] Pedidos - Compras (`->pedidosCompras`)
- [ ] Pedidos - Vendas (`->pedidosVendas`)
- [ ] Produtos (`->produtos`)
- [ ] Produtos - Estruturas (`->produtosEstruturas`)
- [ ] Produtos - Fornecedores (`->produtosFornecedores`)
- [ ] Produtos - Lojas (`->produtosLojas`)
- [ ] Produtos - Variações (`->produtosVariacoes`)
- [ ] Situações (`->situacoes`)
- [ ] Situações - Módulos (`->situacoesModulos`)
- [ ] Situações - Transições (`->situacoesTransicoes`)
- [ ] Usuários (`->usuarios`)
- [ ] Vendedores (`->vendedores`)

## Exemplo de uso

Para listar seus produtos, basta executar:

```php
use AleBatistella\BlingErpApi\Bling;

$apiKey = "sua_api_key";
$blingConnection = new Bling($apiKey);

$products = $blingConnection->produtos->get();

var_dump($products);
```

## Executando os testes do projeto

Faça o clone do projeto, instale as dependências e execute:

```bash
vendor/phpunit/phpunit/phpunit -c phpunit.xml
```

## Contribuindo ao projeto

- [Guia de contribuição](https://github.com/AlexandreBellas/bling-erp-api-php/blob/v5.0.0/CONTRIBUTING.md)
- [Apoie o projeto](https://www.paypal.com/donate/?hosted_button_id=G2NJKZ5MUMKBS)
