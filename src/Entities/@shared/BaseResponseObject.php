<?php

namespace AleBatistella\BlingErpApi\Entities\Shared;

use AleBatistella\BlingErpApi\Contracts\IResponseObject;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use AleBatistella\BlingErpApi\Exceptions\BlingParseResponsePayloadException;

/**
 * Classe base para objetos de retorno.
 */
readonly abstract class BaseResponseObject implements IResponseObject
{
    /**
     * Construtor base.
     */
    private function __construct(...$args)
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

        foreach ($reflectionProperties as $reflectionProperty) {
            $propName = $reflectionProperty->getName();
            $propType = $reflectionProperty->getType();

            if (is_null($propType)) {
                $classSignature = static::class;
                throw new BlingInternalException(
                    "Type of \"$propName\" from class \"{$classSignature}\" cannot be undefined."
                );
            }

            if ($propType instanceof \ReflectionNamedType) {
                $properties[$propName] = static::parseProperty(
                    propType: $propType,
                    propName: $propName,
                    attributes: $attributes
                );

                continue;
            }

            $success = false;
            foreach ($propType->getTypes() as $propTypeFromUnion) {
                if ($success) {
                    break;
                }

                try {
                    $properties[$propName] = static::parseProperty(
                        propType: $propTypeFromUnion,
                        propName: $propName,
                        attributes: $attributes
                    );

                    $success = true;
                } catch (BlingParseResponsePayloadException) {
                    //
                }
            }

            if (!$success) {
                $classSignature = static::class;
                throw new BlingInternalException(
                    "Could not parse union type \"$propName\" of class \"$classSignature\"."
                );
            }
        }

        return new static(...$properties);
    }

    /**
     * Processa um atributo.
     *
     * @param \ReflectionNamedType $propType
     * @param string $propName
     * @param array $attributes
     *
     * @return mixed
     */
    private static function parseProperty(
        \ReflectionNamedType $propType,
        string $propName,
        array $attributes
    ): mixed {
        $propTypeName = $propType->getName();
        $allowsNull = $propType->allowsNull();
        $fromRules = static::fromRules();
        $objSignature = $propTypeName;

        // Null check
        if (!array_key_exists($propName, $attributes)) {
            if ($allowsNull) return null;

            throw new BlingInternalException(
                "Could not parse property \"$propName\" of type \"$objSignature\"."
            );
        }

        if (in_array($propTypeName, ['int', 'string', 'bool', 'float'])) {
            // Primitivo
            return $attributes[$propName];
        }

        if ($propTypeName === 'array') {
            return array_key_exists($propName, $fromRules)
                ? // Array de objetos 
                array_map(
                    fn (array $item) => $fromRules[$propName]::from($item),
                    $attributes[$propName]
                )
                : // Array de primitivos
                $attributes[$propName];
        }

        // Enum
        if (enum_exists($objSignature)) {
            if ($allowsNull && !isset($attributes[$propName])) {
                return null;
            }

            /** @var \BackedEnum */
            $enumSignature = $objSignature;
            $enumValue = $enumSignature::tryFrom($attributes[$propName]);

            if (!is_null($enumValue)) return $enumValue;
            if ($allowsNull) return null;

            throw new BlingInternalException(
                "Could not parse enum property \"$propName\" of type \"$objSignature\"."
            );
        }

        // Objeto
        /** @var IResponseObject $objSignature */
        return $objSignature::from($attributes[$propName]);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return objectToArray($this);
    }
}
