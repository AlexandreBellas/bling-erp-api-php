<?php

namespace AleBatistella\BlingErpApi\Entities\Contratos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Contratos\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Contratos\Enum\TipoManutencao;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param string $descricao
     * @param string $data
     * @param string $numero
     * @param float $valor
     * @param Situacao $situacao
     * @param Id $contato
     * @param string $dataFim
     * @param TipoManutencao $tipoManutencao
     * @param bool $emitirOrdemServico
     * @param string $observacoes
     * @param FindResponseDataVendedor $vendedor
     * @param Id $categoria
     * @param FindResponseDataDesconto $desconto
     * @param Id $contaContabil
     * @param Id $formaPagamento
     * @param ?FindResponseDataNotaFiscal $notaFiscal
     * @param FindResponseDataCobranca $cobranca
     */
    public function __construct(
        public ?int $id,
        public string $descricao,
        public string $data,
        public string $numero,
        public float $valor,
        public Situacao $situacao,
        public Id $contato,
        public string $dataFim,
        public TipoManutencao $tipoManutencao,
        public bool $emitirOrdemServico,
        public string $observacoes,
        public FindResponseDataVendedor $vendedor,
        public Id $categoria,
        public FindResponseDataDesconto $desconto,
        public Id $contaContabil,
        public Id $formaPagamento,
        public ?FindResponseDataNotaFiscal $notaFiscal,
        public FindResponseDataCobranca $cobranca,
    ) {
    }
}
