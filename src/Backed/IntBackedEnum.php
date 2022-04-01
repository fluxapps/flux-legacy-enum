<?php

namespace FluxLegacyEnum\Backed;

use FluxLegacyEnum\Unit\UnitEnum;

interface IntBackedEnum extends UnitEnum, IntBackedEnumValue
{

    /**
     * @return static
     */
    public static function from(int $value)/* : static*/ : self;


    /**
     * @return static|null
     */
    public static function tryFrom(int $value)/* : ?static*/ : ?self;
}
