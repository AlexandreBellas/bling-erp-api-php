<?php

namespace AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Find;

use AleBatistella\BlingErpApi\Entities\ContasPagar\Enum\Situacao;
use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaUnicaDTO as Unica;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaParceladaDTO as Parcelada;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaDTO as Normal;
use AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaSemanalDTO as Semanal;

/**
 * Dados da resposta.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param \AleBatistella\BlingErpApi\Entities\ContasPagar\Enum\Situacao $situacao
     * @param string $vencimento
     * @param float $valor
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $contato
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $formaPagamento
     * @param ?float $saldo
     * @param ?string $dataEmissao
     * @param string $vencimentoOriginal
     * @param ?string $numeroDocumento
     * @param ?string $competencia
     * @param ?string $historico
     * @param string $numeroBanco
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $portador
     * @param ?\AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $categoria
     * @param array $borderos
     * @param \AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaUnicaDTO|\AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaParceladaDTO|\AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaDTO|\AleBatistella\BlingErpApi\Entities\ContasPagar\Schema\Shared\ContasPagarOcorrenciaSemanalDTO|null $ocorrencia
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
        public array $borderos,
        public Unica|Parcelada|Normal|Semanal|null $ocorrencia,
    ) {}
}
