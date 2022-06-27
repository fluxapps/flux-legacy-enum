<?php

namespace FluxLegacyEnum\Adapter\Backed;

use FluxLegacyEnum\Adapter\_Internal\LegacyEnumCallStatic;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumToString;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumUtils;
use FluxLegacyEnum\Backed\IntBackedEnum;
use JsonSerializable;

abstract class LegacyIntBackedEnum implements IntBackedEnum, JsonSerializable
{

    use LegacyEnumCallStatic;
    use LegacyEnumToString;

    private function __construct(
        public readonly string $name,
        public readonly int $value
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


    public function jsonSerialize() : int
    {
        return $this->value;
    }
}
