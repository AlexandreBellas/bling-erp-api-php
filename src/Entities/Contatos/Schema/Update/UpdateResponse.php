<?php

namespace AleBatistella\BlingErpApi\Entities\Contatos\Schema\Update;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

/**
 * Resposta da alteração de uma conta a receber pelo ID.
 */
readonly final class UpdateResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     *
     * @param Id $data
     */
    public function __construct(
        public Id $data
    ) {
    }

    /**
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): null
    {
        if (!is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        return null;
    }
}
