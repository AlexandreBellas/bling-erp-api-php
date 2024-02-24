<?php

namespace Tests\Unit\AleBatistella\BlingErpApi;

use AleBatistella\BlingErpApi\Bling;
use AleBatistella\BlingErpApi\Entities\Borderos\Borderos;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\CamposCustomizados;
use AleBatistella\BlingErpApi\Entities\CategoriasLojas\CategoriasLojas;
use AleBatistella\BlingErpApi\Entities\CategoriasProdutos\CategoriasProdutos;
use AleBatistella\BlingErpApi\Entities\CategoriasReceitasDespesas\CategoriasReceitasDespesas;
use AleBatistella\BlingErpApi\Entities\ContasPagar\ContasPagar;
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
}
