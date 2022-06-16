<?php

namespace FluxLegacyEnum\Adapter\Backed;

use FluxLegacyEnum\Adapter\_Internal\LegacyEnumCallStatic;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumToString;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumUtils;
use FluxLegacyEnum\Backed\IntBackedEnum;
use JsonSerializable;
use LogicException;

abstract class LegacyIntBackedEnum implements IntBackedEnum, JsonSerializable
{

    use LegacyEnumCallStatic;
    use LegacyEnumToString;

    private function __construct(
        private readonly string $_name,
        private readonly int $_value
    ) {

    }


    /**
     * @return static[]
     */
    public static final function cases() : array
    {
        return LegacyEnumUtils::cases(
            static::class,
            function (string $name, int $value) : static {
                return static::new(
                    $name,
                    $value
                );
            },
            true,
            true
        );
    }


    public static final function from(int $value) : static
    {
        return LegacyEnumUtils::fromValue(
            static::cases(),
            $value,
            static::class
        );
    }


    public static final function tryFrom(int $value) : ?static
    {
        return LegacyEnumUtils::tryFromValue(
            static::cases(),
            $value
        );
    }


    private static function new(
        string $name,
        int $value
    ) : static {
        return new static(
            $name,
            $value
        );
    }


    public final function __debugInfo() : ?array
    {
        return [
            "name"  => $this->name,
            "value" => $this->value
        ];
    }


    public final function __get(string $key)/* : string|int*/
    {
        switch ($key) {
            case "name":
                return $this->_name;

            case "value":
                return $this->_value;

            default:
                throw new LogicException("Can't get " . $key);
        }
    }


    public final function __set(string $key, mixed $value) : void
    {
        throw new LogicException("Can't set");
    }


    public function jsonSerialize() : int
    {
        return $this->value;
    }


    private function __clone()
    {
        throw new LogicException("Can't clone");
    }
}
