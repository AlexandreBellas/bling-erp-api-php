<?php

namespace AleBatistella\BlingErpApi;

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
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use AleBatistella\BlingErpApi\Providers\IoC;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;

/**
 * Módulo conector à API do Bling.
 *
 * @property Borderos $borderos
 * @property CamposCustomizados $camposCustomizados
 * @property CategoriasLojas $categoriasLojas
 * @property CategoriasProdutos $categoriasProdutos
 * @property CategoriasReceitasDespesas $categoriasReceitasDespesas
 * @property ContasPagar $contasPagar
 * @property ContasReceber $contasReceber
 * @property ContasContabeis $contasContabeis
 * @property Contatos $contatos
 * @property ContatosTipos $contatosTipos
 * @property Contratos $contratos
 * @property Depositos $depositos
 * @property Empresas $empresas
 */
class Bling
{
  /** @property-read IBlingRepository $repository Repositório de conexão ao Bling. */
  private readonly IBlingRepository $repository;

  /** @property array $modules Módulos instanciados para utilização. */
  private array $modules;

  /**
   * Constrói o objeto.
   *
   * @param string $accessToken
   */
  public function __construct(string $accessToken)
  {
    $this->repository = IoC::getRepository($accessToken);
    $this->modules = [];
  }

  /**
   * Obtém um módulo através de sua assinatura (seguindo o _pattern_ `Instance`).
   *
   * @param string $entityClassName O nome da classe da entidade desejada.
   *
   * @return BaseEntity A instância da entidade.
   */
  private function getModule(string $entityClassName): BaseEntity
  {
    if (!array_key_exists($entityClassName, $this->modules)) {
      $this->modules[$entityClassName] = new $entityClassName($this->repository);
    }

    return $this->modules[$entityClassName];
  }

  /**
   * _Facade_ de busca da entidade correta.
   */
  public function __get(string $name)
  {
    return match ($name) {
      'borderos' => $this->getModule(Borderos::class),
      'camposCustomizados' => $this->getModule(CamposCustomizados::class),
      'categoriasLojas' => $this->getModule(CategoriasLojas::class),
      'categoriasProdutos' => $this->getModule(CategoriasProdutos::class),
      'categoriasReceitasDespesas' => $this->getModule(CategoriasReceitasDespesas::class),
      'contasPagar' => $this->getModule(ContasPagar::class),
      'contasReceber' => $this->getModule(ContasReceber::class),
      'contasContabeis' => $this->getModule(ContasContabeis::class),
      'contatos' => $this->getModule(Contatos::class),
      'contatosTipos' => $this->getModule(ContatosTipos::class),
      'contratos' => $this->getModule(Contratos::class),
      'depositos' => $this->getModule(Depositos::class),
      'empresas' => $this->getModule(Empresas::class),
      default => throw new BlingInternalException("A entidade \"$name\" não existe.")
    };
  }
}
