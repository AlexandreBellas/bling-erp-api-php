<?php

namespace AleBatistella\BlingErpApi\Entities\Borderos\Schema\Delete;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da deleção de borderôs.
 */
readonly final class DeleteResponse extends BaseResponseRootObject
{
    /**
     * @inheritDoc
     */
    public static function fromResponse(ResponseOptions $response): null
    {
        if (!is_null($response->body)) {
            static::throwForInconsistentResponseOptions($response);
        }

        return null;
    }
}
