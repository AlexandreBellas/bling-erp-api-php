<?php

namespace AleBatistella\BlingErpApi;

use AleBatistella\BlingErpApi\Entities\Borderos\Borderos;
use AleBatistella\BlingErpApi\Entities\CamposCustomizados\CamposCustomizados;
use AleBatistella\BlingErpApi\Entities\CanaisDeVenda\CanaisDeVenda;
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
use AleBatistella\BlingErpApi\Entities\GruposDeProdutos\GruposDeProdutos;
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
use AleBatistella\BlingErpApi\Entities\OrdensDeProducao\OrdensDeProducao;
use AleBatistella\BlingErpApi\Entities\PedidosCompras\PedidosCompras;
use AleBatistella\BlingErpApi\Entities\PedidosVendas\PedidosVendas;
use AleBatistella\BlingErpApi\Entities\Produtos\Produtos;
use AleBatistella\BlingErpApi\Entities\ProdutosEstruturas\ProdutosEstruturas;
use AleBatistella\BlingErpApi\Entities\ProdutosFornecedores\ProdutosFornecedores;
use AleBatistella\BlingErpApi\Entities\ProdutosLojas\ProdutosLojas;
use AleBatistella\BlingErpApi\Entities\ProdutosVariacoes\ProdutosVariacoes;
use AleBatistella\BlingErpApi\Entities\PropostasComerciais\PropostasComerciais;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Situacoes\Situacoes;
use AleBatistella\BlingErpApi\Entities\SituacoesModulos\SituacoesModulos;
use AleBatistella\BlingErpApi\Entities\SituacoesTransicoes\SituacoesTransicoes;
use AleBatistella\BlingErpApi\Entities\Usuarios\Usuarios;
use AleBatistella\BlingErpApi\Entities\Vendedores\Vendedores;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use AleBatistella\BlingErpApi\Providers\IoC;
use AleBatistella\BlingErpApi\Repositories\IBlingRepository;

/**
 * Módulo conector à API do Bling.
 *
 * @property Borderos $borderos
 * @property CamposCustomizados $camposCustomizados
 * @property CanaisDeVenda $canaisDeVenda
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
 * @property Estoques $estoques
 * @property FormasDePagamentos $formasDePagamentos
 * @property GruposDeProdutos $gruposDeProdutos
 * @property Homologacao $homologacao
 * @property Logisticas $logisticas
 * @property LogisticasEtiquetas $logisticasEtiquetas
 * @property LogisticasObjetos $logisticasObjetos
 * @property LogisticasRemessas $logisticasRemessas
 * @property LogisticasServicos $logisticasServicos
 * @property NaturezasDeOperacoes $naturezasDeOperacoes
 * @property Nfces $nfces
 * @property Nfses $nfses
 * @property Nfes $nfes
 * @property Notificacoes $notificacoes
 * @property OrdensDeProducao $ordensDeProducao
 * @property PedidosCompras $pedidosCompras
 * @property PedidosVendas $pedidosVendas
 * @property Produtos $produtos
 * @property ProdutosEstruturas $produtosEstruturas
 * @property ProdutosFornecedores $produtosFornecedores
 * @property ProdutosLojas $produtosLojas
 * @property ProdutosVariacoes $produtosVariacoes
 * @property PropostasComerciais $propostasComerciais
 * @property Situacoes $situacoes
 * @property SituacoesModulos $situacoesModulos
 * @property SituacoesTransicoes $situacoesTransicoes
 * @property Usuarios $usuarios
 * @property Vendedores $vendedores
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
      'canaisDeVenda' => $this->getModule(CanaisDeVenda::class),
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
      'estoques' => $this->getModule(Estoques::class),
      'formasDePagamentos' => $this->getModule(FormasDePagamentos::class),
      'gruposDeProdutos' => $this->getModule(GruposDeProdutos::class),
      'homologacao' => $this->getModule(Homologacao::class),
      'logisticas' => $this->getModule(Logisticas::class),
      'logisticasEtiquetas' => $this->getModule(LogisticasEtiquetas::class),
      'logisticasObjetos' => $this->getModule(LogisticasObjetos::class),
      'logisticasRemessas' => $this->getModule(LogisticasRemessas::class),
      'logisticasServicos' => $this->getModule(LogisticasServicos::class),
      'naturezasDeOperacoes' => $this->getModule(NaturezasDeOperacoes::class),
      'nfces' => $this->getModule(Nfces::class),
      'nfses' => $this->getModule(Nfses::class),
      'nfes' => $this->getModule(Nfes::class),
      'notificacoes' => $this->getModule(Notificacoes::class),
      'ordensDeProducao' => $this->getModule(OrdensDeProducao::class),
      'pedidosCompras' => $this->getModule(PedidosCompras::class),
      'pedidosVendas' => $this->getModule(PedidosVendas::class),
      'produtos' => $this->getModule(Produtos::class),
      'produtosEstruturas' => $this->getModule(ProdutosEstruturas::class),
      'produtosFornecedores' => $this->getModule(ProdutosFornecedores::class),
      'produtosLojas' => $this->getModule(ProdutosLojas::class),
      'produtosVariacoes' => $this->getModule(ProdutosVariacoes::class),
      'propostasComerciais' => $this->getModule(PropostasComerciais::class),
      'situacoes' => $this->getModule(Situacoes::class),
      'situacoesModulos' => $this->getModule(SituacoesModulos::class),
      'situacoesTransicoes' => $this->getModule(SituacoesTransicoes::class),
      'usuarios' => $this->getModule(Usuarios::class),
      'vendedores' => $this->getModule(Vendedores::class),
      default => throw new BlingInternalException("A entidade \"$name\" não existe.")
    };
  }
}
