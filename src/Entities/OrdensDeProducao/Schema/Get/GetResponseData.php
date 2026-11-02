<?php

namespace AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Get;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Dados da resposta.
 */
readonly final class GetResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     * @param ?string $dataPrevisaoInicio
     * @param ?string $dataPrevisaoFinal
     * @param ?string $dataInicio
     * @param ?string $dataFim
     * @param int $numero
     * @param ?string $responsavel
     * @param \AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Get\GetResponseDataDeposito $deposito
     * @param \AleBatistella\BlingErpApi\Entities\OrdensDeProducao\Schema\Get\GetResponseDataSituacao $situacao
     */
    public function __construct(
        public ?int $id,
        public ?string $dataPrevisaoInicio,
        public ?string $dataPrevisaoFinal,
        public ?string $dataInicio,
        public ?string $dataFim,
        public int $numero,
        public ?string $responsavel,
        public GetResponseDataDeposito $deposito,
        public GetResponseDataSituacao $situacao,
    ) {}
}
