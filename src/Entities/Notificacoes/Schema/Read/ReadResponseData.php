<?php

namespace AleBatistella\BlingErpApi\Entities\Notificacoes\Schema\Read;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class ReadResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $id
     * @param string $emitente
     * @param string $modulo
     * @param string $descricao
     * @param string $titulo
     * @param ?string $fonte
     * @param ?string $linkAjuda
     * @param ?string $dataCriacao
     * @param string $dataEnvio
     * @param ?string $dataVigencia
     * @param ?string $dataAcao
     * @param ?string $dataLeitura
     * @param ?string $dataAlerta
     * @param ?string $dataPerigo
     * @param ?ReadResponseDataEnquadramentos[] $enquadramentos
     */
    public function __construct(
        public ?string $id,
        public string $emitente,
        public string $modulo,
        public string $descricao,
        public string $titulo,
        public ?string $fonte,
        public ?string $linkAjuda,
        public ?string $dataCriacao,
        public string $dataEnvio,
        public ?string $dataVigencia,
        public ?string $dataAcao,
        public ?string $dataLeitura,
        public ?string $dataAlerta,
        public ?string $dataPerigo,
        public ?array $enquadramentos,
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
            'enquadramentos' => ReadResponseDataEnquadramentos::class,
        ];
    }
}
