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

        // Null check
        if ($allowsNull && !array_key_exists($propName, $attributes)) {
            return null;
        }

        if (in_array($propTypeName, ['int', 'string', 'bool', 'float'])) {
            // Primitivo
            return $attributes[$propName];
        }

        if ($propTypeName === 'array') {
            return array_key_exists($propName, $fromRules)
                ? // Array de objetos 
                array_map(
                    fn(array $item) => $fromRules[$propName]::from($item),
                    $attributes[$propName]
                )
                : // Array de primitivos
                $attributes[$propName];
        }

        // Objeto
        /** @var IResponseObject */
        $objSignature = $propTypeName;
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