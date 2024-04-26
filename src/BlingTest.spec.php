<?php

namespace Tests\Unit\AleBatistella\BlingErpApi;

use AleBatistella\BlingErpApi\Bling;
use AleBatistella\BlingErpApi\Entities\Borderos\Borderos;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\CamposCustomizados;
use AleBatistella\BlingErpApi\Entities\CategoriasLojas\CategoriasLojas;
use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\CategoriasProdutos;
use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\CategoriasReceitasDespesas;
use AleBatistella\BlingErpApi\Entities\ContasContabeis\ContasContabeis;
use AleBatistella\BlingErpApi\Entities\ContasPagar\ContasPagar;
use AleBatistella\BlingErpApi\Entities\ContasReceber\ContasReceber;
use AleBatistella\BlingErpApi\Entities\Contatos\Contatos;
use AleBatistella\BlingErpApi\Entities\ContatosTipos\ContatosTipos;
use AleBatistella\BlingErpApi\Entities\Contratos\Contratos;
use AleBatistella\BlingErpApi\Entities\Depositos\Depositos;
use AleBatistella\BlingErpApi\Entities\Empresas\Empresas;
use AleBatistella\BlingErpApi\Entities\Estoques\Estoques;
use AleBatistella\BlingErpApi\Entities\FormasDePagamentos\FormasDePagamentos;
use AleBatistella\BlingErpApi\Entities\Homologacao\Homologacao;
use AleBatistella\BlingErpApi\Entities\Logisticas\Logisticas;
use AleBatistella\BlingErpApi\Entities\LogisticasEtiquetas\LogisticasEtiquetas;
use AleBatistella\BlingErpApi\Entities\LogisticasObjetos\LogisticasObjetos;
use AleBatistella\BlingErpApi\Entities\LogisticasRemessas\LogisticasRemessas;
use AleBatistella\BlingErpApi\Entities\LogisticasServicos\LogisticasServicos;
use AleBatistella\BlingErpApi\Entities\NaturezasDeOperacoes\NaturezasDeOperacoes;
use AleBatistella\BlingErpApi\Entities\Nfces\Nfces;
use AleBatistella\BlingErpApi\Entities\Nfes\Nfes;
use AleBatistella\BlingErpApi\Entities\Nfses\Nfses;
use AleBatistella\BlingErpApi\Entities\Notificacoes\Notificacoes;
use AleBatistella\BlingErpApi\Entities\PedidosCompras\PedidosCompras;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\PedidosVendas;
use AleBatistella\BlingErpApi\Entities\Produtos\Produtos;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\ProdutosEstruturas;
use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\ProdutosFornecedores;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\ProdutosLojas;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\ProdutosVariacoes;
use AleBatistella\BlingErpApi\Entities\Situacoes\Situacoes;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\SituacoesModulos;
use AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\SituacoesTransicoes;
use AleBatistella\BlingErpApi\Entities\Usuarios\Usuarios;
use AleBatistella\BlingErpApi\Entities\Vendedores\Vendedores;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use PHPUnit\Framework\TestCase;

/**
 * Teste de `Bling`.
 */
class BlingTest extends TestCase
{
  /**
   * Retorna uma nova instância do módulo conector.
   *
   * @return Bling
   */
  private function getInstance(): Bling
  {
    return new Bling(fake()->word());
  }

  /**
   * Testa a instanciação do módulo.
   *
   * @return void
   */
  public function testShouldInstantiateCorrectly(): void
  {
    $expected = Bling::class;

    $actual = $this->getInstance();

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter uma entidade inexistente.
   *
   * @return void
   */
  public function testShouldNotGetInexistentEntity(): void
  {
    $signature = fake()->word();
    $this->expectException(BlingInternalException::class);
    $this->expectExceptionMessage("A entidade \"$signature\" não existe.");

    $this->getInstance()->$signature;
  }

  /**
   * Testa obter a entidade Borderos.
   *
   * @return void
   */
  public function testShouldGetBorderosCorrectly(): void
  {
    $expected = Borderos::class;

    $actual = $this->getInstance()->borderos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Campos Customizados.
   *
   * @return void
   */
  public function testShouldGetCamposCustomizadosCorrectly(): void
  {
    $expected = CamposCustomizados::class;

    $actual = $this->getInstance()->camposCustomizados;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Categorias - Lojas.
   *
   * @return void
   */
  public function testShouldGetCategoriasLojasCorrectly(): void
  {
    $expected = CategoriasLojas::class;

    $actual = $this->getInstance()->categoriasLojas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Categorias - Produtos.
   *
   * @return void
   */
  public function testShouldGetCategoriasProdutosCorrectly(): void
  {
    $expected = CategoriasProdutos::class;

    $actual = $this->getInstance()->categoriasProdutos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Categorias - Receitas e Despesas.
   *
   * @return void
   */
  public function testShouldGetCategoriasReceitasDespesasCorrectly(): void
  {
    $expected = CategoriasReceitasDespesas::class;

    $actual = $this->getInstance()->categoriasReceitasDespesas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Contas a Pagar.
   *
   * @return void
   */
  public function testShouldGetContasPagarCorrectly(): void
  {
    $expected = ContasPagar::class;

    $actual = $this->getInstance()->contasPagar;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Contas a Receber.
   *
   * @return void
   */
  public function testShouldGetContasReceberCorrectly(): void
  {
    $expected = ContasReceber::class;

    $actual = $this->getInstance()->contasReceber;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Contas Contábeis.
   *
   * @return void
   */
  public function testShouldGetContasContabeisCorrectly(): void
  {
    $expected = ContasContabeis::class;

    $actual = $this->getInstance()->contasContabeis;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Contatos.
   *
   * @return void
   */
  public function testShouldGetContatosCorrectly(): void
  {
    $expected = Contatos::class;

    $actual = $this->getInstance()->contatos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Contatos - Tipos.
   *
   * @return void
   */
  public function testShouldGetContatosTiposCorrectly(): void
  {
    $expected = ContatosTipos::class;

    $actual = $this->getInstance()->contatosTipos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Contatos.
   *
   * @return void
   */
  public function testShouldGetContratosCorrectly(): void
  {
    $expected = Contratos::class;

    $actual = $this->getInstance()->contratos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Depósitos.
   *
   * @return void
   */
  public function testShouldGetDepositosCorrectly(): void
  {
    $expected = Depositos::class;

    $actual = $this->getInstance()->depositos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Empresas.
   *
   * @return void
   */
  public function testShouldGetEmpresasCorrectly(): void
  {
    $expected = Empresas::class;

    $actual = $this->getInstance()->empresas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Estoques.
   *
   * @return void
   */
  public function testShouldGetEstoquesCorrectly(): void
  {
    $expected = Estoques::class;

    $actual = $this->getInstance()->estoques;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Formas de Pagamentos.
   *
   * @return void
   */
  public function testShouldGetFormasDePagamentosCorrectly(): void
  {
    $expected = FormasDePagamentos::class;

    $actual = $this->getInstance()->formasDePagamentos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Homologação.
   *
   * @return void
   */
  public function testShouldGetHomologacaoCorrectly(): void
  {
    $expected = Homologacao::class;

    $actual = $this->getInstance()->homologacao;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Logísticas.
   *
   * @return void
   */
  public function testShouldGetLogisticasCorrectly(): void
  {
    $expected = Logisticas::class;

    $actual = $this->getInstance()->logisticas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Logísticas - Etiquetas.
   *
   * @return void
   */
  public function testShouldGetLogisticasEtiquetasCorrectly(): void
  {
    $expected = LogisticasEtiquetas::class;

    $actual = $this->getInstance()->logisticasEtiquetas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Logísticas - Objetos.
   *
   * @return void
   */
  public function testShouldGetLogisticasObjetosCorrectly(): void
  {
    $expected = LogisticasObjetos::class;

    $actual = $this->getInstance()->logisticasObjetos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Logísticas - Remessas.
   *
   * @return void
   */
  public function testShouldGetLogisticasRemessasCorrectly(): void
  {
    $expected = LogisticasRemessas::class;

    $actual = $this->getInstance()->logisticasRemessas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Logísticas - Serviços.
   *
   * @return void
   */
  public function testShouldGetLogisticasServicosCorrectly(): void
  {
    $expected = LogisticasServicos::class;

    $actual = $this->getInstance()->logisticasServicos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Naturezas de Operações.
   *
   * @return void
   */
  public function testShouldGetNaturezasDeOperacoesCorrectly(): void
  {
    $expected = NaturezasDeOperacoes::class;

    $actual = $this->getInstance()->naturezasDeOperacoes;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade NFC-es.
   *
   * @return void
   */
  public function testShouldGetNfcesCorrectly(): void
  {
    $expected = Nfces::class;

    $actual = $this->getInstance()->nfces;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade NFS-es.
   *
   * @return void
   */
  public function testShouldGetNfsesCorrectly(): void
  {
    $expected = Nfses::class;

    $actual = $this->getInstance()->nfses;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade NF-es.
   *
   * @return void
   */
  public function testShouldGetNfesCorrectly(): void
  {
    $expected = Nfes::class;

    $actual = $this->getInstance()->nfes;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Notificações.
   *
   * @return void
   */
  public function testShouldGetNotificacoesCorrectly(): void
  {
    $expected = Notificacoes::class;

    $actual = $this->getInstance()->notificacoes;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Pedidos de Compras.
   *
   * @return void
   */
  public function testShouldGetPedidosComprasCorrectly(): void
  {
    $expected = PedidosCompras::class;

    $actual = $this->getInstance()->pedidosCompras;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Pedidos de Vendas.
   *
   * @return void
   */
  public function testShouldGetPedidosVendasCorrectly(): void
  {
    $expected = PedidosVendas::class;

    $actual = $this->getInstance()->pedidosVendas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Produtos.
   *
   * @return void
   */
  public function testShouldGetProdutosCorrectly(): void
  {
    $expected = Produtos::class;

    $actual = $this->getInstance()->produtos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Produtos - Estruturas.
   *
   * @return void
   */
  public function testShouldGetProdutosEstruturasCorrectly(): void
  {
    $expected = ProdutosEstruturas::class;

    $actual = $this->getInstance()->produtosEstruturas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Produtos - Fornecedores.
   *
   * @return void
   */
  public function testShouldGetProdutosFornecedoresCorrectly(): void
  {
    $expected = ProdutosFornecedores::class;

    $actual = $this->getInstance()->produtosFornecedores;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Produtos - Lojas.
   *
   * @return void
   */
  public function testShouldGetProdutosLojasCorrectly(): void
  {
    $expected = ProdutosLojas::class;

    $actual = $this->getInstance()->produtosLojas;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Produtos - Variações.
   *
   * @return void
   */
  public function testShouldGetProdutosVariacoesCorrectly(): void
  {
    $expected = ProdutosVariacoes::class;

    $actual = $this->getInstance()->produtosVariacoes;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Situações.
   *
   * @return void
   */
  public function testShouldGetSituacoesCorrectly(): void
  {
    $expected = Situacoes::class;

    $actual = $this->getInstance()->situacoes;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Situações - Módulos.
   *
   * @return void
   */
  public function testShouldGetSituacoesModulosCorrectly(): void
  {
    $expected = SituacoesModulos::class;

    $actual = $this->getInstance()->situacoesModulos;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Situações - Transições.
   *
   * @return void
   */
  public function testShouldGetSituacoesTransicoesCorrectly(): void
  {
    $expected = SituacoesTransicoes::class;

    $actual = $this->getInstance()->situacoesTransicoes;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Usuários.
   *
   * @return void
   */
  public function testShouldGetUsuariosCorrectly(): void
  {
    $expected = Usuarios::class;

    $actual = $this->getInstance()->usuarios;

    $this->assertInstanceOf($expected, $actual);
  }

  /**
   * Testa obter a entidade Vendedores.
   *
   * @return void
   */
  public function VendedoresCorrectly(): void
  {
    $expected = Vendedores::class;

    $actual = $this->getInstance()->vendedores;

    $this->assertInstanceOf($expected, $actual);
  }
}
