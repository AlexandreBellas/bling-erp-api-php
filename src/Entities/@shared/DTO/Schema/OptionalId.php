<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Objeto com ID opcional.
 */
final readonly class OptionalId extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $id
     */
    public function __construct(public ?int $id) {}
}
