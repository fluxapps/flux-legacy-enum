<?php

namespace FluxLegacyEnum\Backed;

use FluxLegacyEnum\Unit\UnitEnum;

/**
 * @property-read string $value
 */
interface StringBackedEnum extends UnitEnum
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
