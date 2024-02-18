<?php

namespace AleBatistella\BlingErpApi\Entities\Borderos\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da busca de borderôs.
 */
readonly final class FindResponse extends BaseResponseRootObject
{
  /**
   * Constrói o objeto.
   *
   * @param FindResponseData $data
   */
  public function __construct(
    public FindResponseData $data
  ) {
  }

  /**
   * @inheritDoc
   */
  public static function fromResponse(ResponseOptions $response): static
  {
    if (is_null($response->body)) {
      static::throwForInconsistentResponseOptions($response);
    }

    return self::from($response->body->content);
  }
}
