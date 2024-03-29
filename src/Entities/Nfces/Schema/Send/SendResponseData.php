<?php

namespace AleBatistella\BlingErpApi\Entities\Nfces\Schema\Send;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class SendResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $xml
     */
    public function __construct(
        public ?string $xml
    ) {
    }
}
