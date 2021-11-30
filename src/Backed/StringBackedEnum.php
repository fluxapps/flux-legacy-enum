<?php

namespace FluxLegacyEnum\Backed;

use FluxLegacyEnum\Unit\UnitEnum;

interface StringBackedEnum extends UnitEnum, StringBackedEnumValue
{

    /**
     * @return static
     */
    public static function from(string $value)/* : static*/ : self;


    /**
     * @return ?static
     */
    public static function tryFrom(string $value)/* : ?static*/ : ?self;
}
