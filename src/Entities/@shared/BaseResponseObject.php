<?php

namespace AleBatistella\BlingErpApi\Entities\Shared;

use AleBatistella\BlingErpApi\Contracts\IResponseObject;

/**
 * Classe base para objetos de retorno.
 */
readonly abstract class BaseResponseObject implements IResponseObject
{
    /**
     * Construtor base.
     */
    public function __construct(...$args)
    {
    }

    /**
     * Conjunto de regras de conversão para o método `from`.
     * 
     * Função usada para ser sobrescrita quando há propriedades na classe que
     * são "_array_ de objetos".
     * 
     * @return array<string, IResponseObject>
     */
    protected static function fromRules(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public static function from(array $attributes): static
    {
        $reflectionProperties = (new \ReflectionClass(static::class))->getProperties();
        $properties = [];
        $fromRules = static::fromRules();

        foreach ($reflectionProperties as $reflectionProperty) {
            $propName = $reflectionProperty->getName();
            $propType = $reflectionProperty->getType();
            $propTypeName = $propType->getName();
            $allowsNull = $reflectionProperty->getType()->allowsNull();

            // Null check
            if ($allowsNull && !array_key_exists($propName, $attributes)) {
                $properties[$propName] = null;
                continue;
            }

            if (in_array($propTypeName, ['int', 'string', 'bool', 'float'])) {
                $properties[$propName] = $attributes[$propName];
            } else if ($propTypeName === 'array') {
                if (array_key_exists($propName, $fromRules)) {
                    // Array de objetos
                    $properties[$propName] = array_map(
                        fn(array $item) => $fromRules[$propName]::from($item),
                        $attributes[$propName]
                    );

                    continue;
                }

                // Array de primitivos
                $properties[$propName] = $attributes[$propName];
            } else {
                // Objeto
                /** @var IResponseObject */
                $objSignature = $propTypeName;
                $properties[$propName] = $objSignature::from($attributes[$propName]);
            }
        }

        return new static(...$properties);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return objectToArray($this);
    }
}