<?php

namespace AleBatistella\BlingErpApi\Entities\ContasReceber\Schema\Find;

use AleBatistella\BlingErpApi\Entities\ContasReceber\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param Situacao $situacao
     * @param string $vencimento
     * @param float $valor
     * @param Id $contato
     * @param ?Id $formaPagamento
     * @param ?float $saldo
     * @param ?string $dataEmissao
     * @param string $vencimentoOriginal
     * @param ?string $numeroDocumento
     * @param ?string $competencia
     * @param ?string $historico
     * @param string $numeroBanco
     * @param ?Id $portador
     * @param ?Id $categoria
     * @param int[] $borderos
     */
    public function __construct(
        public ?int $id,
        public Situacao $situacao,
        public string $vencimento,
        public float $valor,
        public Id $contato,
        public ?Id $formaPagamento,
        public ?float $saldo,
        public ?string $dataEmissao,
        public string $vencimentoOriginal,
        public ?string $numeroDocumento,
        public ?string $competencia,
        public ?string $historico,
        public string $numeroBanco,
        public ?Id $portador,
        public ?Id $categoria,
        public ?Id $vendedor,
        public array $borderos
        // tipar "$ocorrencia" para finalizar FIND
        // falta create, update, download e bankslips
    ) {
    }
}
