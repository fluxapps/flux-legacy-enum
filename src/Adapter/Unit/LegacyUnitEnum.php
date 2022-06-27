<?php

namespace FluxLegacyEnum\Adapter\Unit;

use FluxLegacyEnum\Adapter\_Internal\LegacyEnumCallStatic;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumToString;
use FluxLegacyEnum\Adapter\_Internal\LegacyEnumUtils;
use FluxLegacyEnum\Unit\UnitEnum;

abstract class LegacyUnitEnum implements UnitEnum
{

    use LegacyEnumCallStatic;
    use LegacyEnumToString;

    private function __construct(
        public readonly string $name
    ) {

    }


    /**
     * @return static[]
     */
    public static final function cases() : array
    {
        return LegacyEnumUtils::cases(
            static::class,
            function (string $name) : static {
                return static::new(
                    $name
                );
            }
        );
    }


    private static function new(
        string $name
    ) : static {
        return new static(
            $name
        );
    }
}
