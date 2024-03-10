<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Error;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Objeto de erro da requisição.
 */
readonly final class Error extends BaseResponseObject
{
  /**
   * Constrói o objeto.
   *
   * @param string $type
   * @param string $message
   * @param string $description
   * @param ?ErrorField[] $fields
   */
  public function __construct(
    public string $type,
    public string $message,
    public string $description,
    public ?array $fields = []
  ) {
  }

  /**
   * @inheritDoc
   */
  protected static function fromRules(): array
  {
    return [
      'fields' => ErrorField::class,
    ];
  }
}
