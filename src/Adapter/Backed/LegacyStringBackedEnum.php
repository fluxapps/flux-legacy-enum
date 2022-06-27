<?php

namespace FluxLegacyEnum\Adapter\Backed;

use FluxLegacyEnum\Adapter\_Internal\LegacyEnumCallStatic;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumToString;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumUtils;
use FluxLegacyEnum\Backed\StringBackedEnum;
use JsonSerializable;

abstract class LegacyStringBackedEnum implements StringBackedEnum, JsonSerializable
{

    use LegacyEnumCallStatic;
    use LegacyEnumToString;

    private function __construct(
        public readonly string $name,
        public readonly string $value
    ) {

    }


    /**
     * @return static[]
     */
    public static final function cases() : array
    {
        return LegacyEnumUtils::cases(
            static::class,
            function (string $name, string $value) : static {
                return static::new(
                    $name,
                    $value
                );
            },
            true
        );
    }


    public static final function from(string $value) : static
    {
        return LegacyEnumUtils::fromValue(
            static::cases(),
            $value,
            static::class
        );
    }


    public static final function tryFrom(string $value) : ?static
    {
        return LegacyEnumUtils::tryFromValue(
            static::cases(),
            $value
        );
    }


    private static function new(
        string $name,
        string $value
    ) : static {
        return new static(
            $name,
            $value
        );
    }


    public function jsonSerialize() : string
    {
        return $this->value;
    }
}
