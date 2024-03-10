<?php

namespace AleBatistella\BlingErpApi\Entities\Shared\DTO\Error;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

/**
 * Objeto de erro para um campo da requisição.
 */
readonly final class ErrorField extends BaseResponseObject
{
  /**
   * Constrói o objeto.
   *
   * @param int $code
   * @param string $msg
   * @param ?string $element
   * @param ?string $namespace
   * @param ?ErrorFieldCollection[] $collection
   */
  public function __construct(
    public int $code,
    public string $msg,
    public ?string $element = null,
    public ?string $namespace = null,
    public ?array $collection = []
  ) {
  }

  /**
   * @inheritDoc
   */
  protected static function fromRules(): array
  {
    return [
      'collection' => ErrorFieldCollection::class,
    ];
  }
}
