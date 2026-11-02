<?php

namespace AleBatistella\BlingErpApi\Entities\Borderos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Dados de resposta da busca de borderôs.
 */
readonly final class FindResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param int $id
     * @param string $data
     * @param string $historico
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $portador
     * @param \AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id $categoria
     * @param array $pagamentos
     */
    public function __construct(
        public int $id,
        public string $data,
        public string $historico,
        public Id $portador,
        public Id $categoria,
        public array $pagamentos
    ) {
    }

    /**
     * @inheritDoc
     */
    protected static function fromRules(): array
    {
        return [
          "pagamentos" => FindResponseDataPagamentos::class,
        ];
    }
}
