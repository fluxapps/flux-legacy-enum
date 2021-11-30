<?php

namespace FluxLegacyEnum\Backed;

use FluxLegacyEnum\Unit\UnitEnum;

/**
 * @property-read int $value
 */
interface IntBackedEnum extends UnitEnum
{

    /**
     * @return static
     */
    public static function from(int $value)/* : static*/ : self;


    /**
     * @return ?static
     */
    public static function tryFrom(int $value)/* : ?static*/ : ?self;
}
