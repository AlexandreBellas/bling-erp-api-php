<?php

namespace AleBatistella\BlingErpApi\Entities\Usuarios\Schema\RecoverPassword;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class RecoverPasswordResponseData extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param string $message
     */
    public function __construct(
        public string $message
    ) {
    }
}
